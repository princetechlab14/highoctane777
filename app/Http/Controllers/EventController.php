<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pages;
use App\Models\page_section;
use App\Models\page_content;
use App\Models\category;
use Session;
use DB;
use Image;

class EventController extends Controller
{
    private function checkPermission($feature, $action)
    {
        if (!hasPermission($feature, $action)) {
            $this->flashmessage('You do not have permission to perform this action.', 1);
            return redirect('/admin/dashboard');
        }

        return true;
    }

    public function flashmessage($msg, $status = 1)
    {
        $toastr = '';
        if ($status == 0) {
            $toastr = "toastr.success('$msg');";
        } else {
            $toastr = "toastr.error('$msg');";
        }
        Session::flash('message', $toastr);
    }

    public function images(Request $request, $name, $path, $thumbnail = 0)
    {
        $randString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
        ini_set('memory_limit', '2048M');
        if ($thumbnail == 1) {
            if ($request->hasFile($name)) {
                $img = $request->file($name);
                $destinationPath = public_path('/assets/admin/' . $path . '/thumbnails');
                if (is_array($img)) {
                    foreach ($img as $key => $val1) {
                        if (is_array($val1) && count($val1) > 0) {
                            foreach ($val1 as $vk => $v1) {
                                $image_name = pathinfo($v1->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                                $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                                $resize_image = Image::make($v1->getRealPath());
                                $resize_image->resize(150, 150, function ($constraint) {
                                    $constraint->aspectRatio();
                                })->encode('webp')->save($destinationPath . '/' . $image_name);
                            }
                        } else {
                            $image_name = pathinfo($val1->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                            $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                            $resize_image = Image::make($val1->getRealPath());
                            $resize_image->resize(150, 150, function ($constraint) {
                                $constraint->aspectRatio();
                            })->encode('webp')->save($destinationPath . '/' . $image_name);
                        }
                    }
                } else {
                    $image_name = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                    $image_name = preg_replace('/[^a-z0-9\.]/i', "-", $image_name);
                    $resize_image = Image::make($img->getRealPath());
                    $resize_image->resize(150, 150, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('webp')->save($destinationPath . '/' . $image_name);
                }
            }
        }
        if ($request->hasFile($name)) {
            $file = [];
            $image = $request->file($name);
            if (is_array($image)) {
                $path = public_path('/assets/admin/' . $path);
                foreach ($image as $key => $val) {
                    if (is_array($val) && count($val) > 0) {
                        foreach ($val as $vk => $vv) {
                            $filename = pathinfo($vv->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                            $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                            $filename = str_replace(' ', '-', $filename);
                            $vv->move($path, $filename);
                            $file[$key][] = $filename;
                        }
                    } else {
                        $filename = pathinfo($val->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                        $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                        $filename = str_replace(' ', '-', $filename);
                        $val->move($path, $filename);
                        $file[] = $filename;
                    }
                }
            } else {
                $path = public_path('/assets/admin/' . $path);
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                $filename = str_replace(' ', '-', $filename);
                $image->move($path, $filename);
                $file = $filename;
            }
        }
        return $file ?? '';
    }

    // -------------------------------------------  Event module ---------------------------------------------------------
    public function index()
    {
        if (($check = $this->checkPermission('event', 'can_view')) !== true) {
            return $check;
        }
        return view('admin.events');
    }

    public function create()
    {
        if (($check = $this->checkPermission('event', 'can_create')) !== true) {
            return $check;
        }
        $data['category'] = category::where('p_c_id', 0)->get();
        return view('admin.eventaddupdate', $data);
    }

    public function store(Request $request)
    {
        if (($check = $this->checkPermission('event', 'can_create')) !== true) {
            return $check;
        }
        $data = $request->all();

        if (!empty($data)) {
            $images = [];
            if ($request->hasFile('banner_img')) {
                $images['banner_img'] = $this->images($request, 'banner_img', 'Event', 1);
            }
            if ($request->hasFile('cover_img')) {
                $images['cover_img'] = $this->images($request, 'cover_img', 'Event');
            }

            $event = pages::create([
                'name' => $data['name'],
                'url' => $data['url'],
                'c_id' => $data['c_id'] ?? 0,
                'type' => 2, // 2 for events
                'status' => $data['status'] ?? 1,
                'meta_title' => $data['meta_title'] ?? '',
                'meta_keywords' => $data['meta_keywords'] ?? '',
                'meta_description' => $data['meta_description'] ?? '',
                'banner_img' => $images['banner_img'] ?? '',
                'cover_img' => $images['cover_img'] ?? '',
            ]);

            // Save sections and content
            if (!empty($data['section'])) {
                foreach ($data['section'] as $key => $section) {
                    $sectionData = page_section::create([
                        'p_id' => $event->id,
                        'title' => $section['title'] ?? '',
                        'type' => $section['type'] ?? 0,
                        'order' => $key,
                    ]);

                    if (!empty($section['content'])) {
                        foreach ($section['content'] as $ckey => $content) {
                            $contentImages = [];
                            if ($request->hasFile("section.$key.content.$ckey.image")) {
                                $contentImages = $this->images($request, "section.$key.content.$ckey.image", 'Event');
                            }

                            page_content::create([
                                'p_id' => $event->id,
                                's_id' => $sectionData->id,
                                'title' => $content['title'] ?? '',
                                'description' => $content['description'] ?? '',
                                'image' => $contentImages[0] ?? ($content['old_image'] ?? ''),
                                'order' => $ckey,
                            ]);
                        }
                    }
                }
            }

            $this->flashmessage('Event created successfully', 0);
            return redirect()->route('events.index');
        }
    }

    public function show($id)
    {
        if (($check = $this->checkPermission('event', 'can_view')) !== true) {
            return $check;
        }
        $event = pages::with(['sections', 'sections.contents'])->findOrFail($id);
        return view('admin.eventshow', compact('event'));
    }

    public function edit($id)
    {
        if (($check = $this->checkPermission('event', 'can_edit')) !== true) {
            return $check;
        }
        $data['event'] = pages::with(['sections', 'sections.contents'])->findOrFail($id);
        $data['category'] = category::where('p_c_id', 0)->get();
        return view('admin.eventaddupdate', $data);
    }

    public function update(Request $request, $id)
    {
        if (($check = $this->checkPermission('event', 'can_edit')) !== true) {
            return $check;
        }
        $data = $request->all();

        $event = pages::findOrFail($id);

        if (!empty($data)) {
            $images = [];
            if ($request->hasFile('banner_img')) {
                $images['banner_img'] = $this->images($request, 'banner_img', 'Event', 1);
            }
            if ($request->hasFile('cover_img')) {
                $images['cover_img'] = $this->images($request, 'cover_img', 'Event');
            }

            $updateData = [
                'name' => $data['name'],
                'url' => $data['url'],
                'c_id' => $data['c_id'] ?? 0,
                'status' => $data['status'] ?? 1,
                'meta_title' => $data['meta_title'] ?? '',
                'meta_keywords' => $data['meta_keywords'] ?? '',
                'meta_description' => $data['meta_description'] ?? '',
            ];

            if (!empty($images['banner_img'])) {
                $updateData['banner_img'] = $images['banner_img'];
            }
            if (!empty($images['cover_img'])) {
                $updateData['cover_img'] = $images['cover_img'];
            }

            $event->update($updateData);

            // Update sections and content
            if (!empty($data['section'])) {
                foreach ($data['section'] as $key => $section) {
                    $sectionId = $section['id'] ?? null;

                    if ($sectionId) {
                        $sectionData = page_section::find($sectionId);
                        if ($sectionData) {
                            $sectionData->update([
                                'title' => $section['title'] ?? '',
                                'type' => $section['type'] ?? 0,
                                'order' => $key,
                            ]);
                        }
                    } else {
                        $sectionData = page_section::create([
                            'p_id' => $event->id,
                            'title' => $section['title'] ?? '',
                            'type' => $section['type'] ?? 0,
                            'order' => $key,
                        ]);
                    }

                    if (!empty($section['content'])) {
                        foreach ($section['content'] as $ckey => $content) {
                            $contentId = $content['id'] ?? null;
                            $contentImages = [];
                            if ($request->hasFile("section.$key.content.$ckey.image")) {
                                $contentImages = $this->images($request, "section.$key.content.$ckey.image", 'Event');
                            }

                            $contentData = [
                                'p_id' => $event->id,
                                's_id' => $sectionData->id,
                                'title' => $content['title'] ?? '',
                                'description' => $content['description'] ?? '',
                                'order' => $ckey,
                            ];

                            if (!empty($contentImages[0])) {
                                $contentData['image'] = $contentImages[0];
                            } elseif (!empty($content['old_image'])) {
                                $contentData['image'] = $content['old_image'];
                            }

                            if ($contentId) {
                                page_content::where('id', $contentId)->update($contentData);
                            } else {
                                page_content::create($contentData);
                            }
                        }
                    }
                }
            }

            $this->flashmessage('Event updated successfully', 0);
            return redirect()->route('events.index');
        }
    }

    public function destroy($id)
    {
        if (($check = $this->checkPermission('event', 'can_delete')) !== true) {
            return $check;
        }

        DB::transaction(function () use ($id) {
            $event = pages::findOrFail($id);

            // Delete related sections and contents
            $sections = page_section::where('p_id', $id)->get();
            foreach ($sections as $section) {
                page_content::where('s_id', $section->id)->delete();
            }
            page_section::where('p_id', $id)->delete();

            $event->delete();
        });

        $this->flashmessage('Event deleted successfully', 0);
        return redirect()->route('events.index');
    }

    // Legacy method for backward compatibility
    public function events(Request $request, $id = 0)
    {
        if ($request->isMethod('post')) {
            if ($id == 0) {
                return $this->store($request);
            } else {
                return $this->update($request, $id);
            }
        }

        if ($id == 0) {
            return $this->index();
        } else {
            return $this->edit($id);
        }
    }

    // Legacy method for backward compatibility
    public function addupdateevent(Request $request, $id = 0)
    {
        if ($id == 0) {
            return $this->create();
        } else {
            return $this->edit($id);
        }
    }

    public function eventajaxdata(Request $request)
    {
        $data = $request->input();
        $draw = $request->get('draw');
        $start = $request->get('start');
        $rowperpage = $request->get('length');
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column'];
        $columnName = $columnName_arr[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];
        $searchValue = $search_arr['value'];

        $query = pages::where('type', 2); // 2 for events

        if ($searchValue != '') {
            $query->where(function ($q) use ($searchValue) {
                $q->where('name', 'like', '%' . $searchValue . '%')
                    ->orWhere('url', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count();

        if ($columnName == 'date') {
            $columnName = 'created_at';
        }

        $records = $query->orderBy($columnName, $columnSortOrder)
            ->skip($start)
            ->take($rowperpage)
            ->get();

        $data_arr = [];

        foreach ($records as $record) {
            $data_arr[] = [
                'id' => $record->id,
                'name' => $record->name,
                'url' => $record->url,
                'status' => $record->status,
                'date' => date('Y-m-d H:i:s', strtotime($record->created_at)),
            ];
        }

        $response = [
            'draw' => intval($draw),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $totalRecords,
            'data' => $data_arr,
        ];

        return response()->json($response);
    }

    public function eventstatus(Request $request)
    {
        $data = $request->all();
        $event = pages::find($data['eventid']);

        if ($event) {
            $event->status = $data['status'];
            $event->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
}

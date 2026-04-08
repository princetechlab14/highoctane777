<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;

use Illuminate\Http\Request;
use App\Models\blogcategory;
use App\Models\pages;
use App\Models\page_section;
use App\Models\page_content;
use App\Models\comment;
use Session;
use DB;
use Image;

class BlogController extends Controller
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
                $destinationPath = public_path('/Assets/Admin/' . $path . '/thumbnails');
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
                $path = public_path('/Assets/Admin/' . $path);
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
                $path = public_path('/Assets/Admin/' . $path);
                $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                $filename = str_replace(' ', '-', $filename);
                $image->move($path, $filename);
                $file[] = $filename;
            }

        }
        if (isset($file) && count($file) > 0) {
            return $file;
        } else {
            return 0;
        }
    }

    // -------------------------------------------  Blog module ---------------------------------------------------------
    public function blogcategory(Request $request, $id = 0)
    {
        $data = $request->only(['blog_category_name','blog_category_url']);

        if ($request->isMethod('post')) {
            $message = $id ? 'Blog Category Updated Successfully' : 'Blog Category Inserted Successfully';

            blogcategory::updateOrCreate(
                ['id' => $id],
                $data
            );

            $this->flashmessage($message, 0);
            return redirect()->back();
        }

        if ($request->isMethod('get') && $id != 0) {
            return response()->json(blogcategory::find($id));
        }

        if ($request->isMethod('get')) {
            // 🔥 Check VIEW permission
            if (($check = $this->checkPermission('blog', 'can_view')) !== true) {
                return $check;
            }
            $data['list'] = blogcategory::orderBy('id', 'DESC')->get();
            return view('admin.blogcategory', $data);
        }
    }
    public function blog()
    {
        // 🔥 Check VIEW permission
        if (($check = $this->checkPermission('blog', 'can_view')) !== true) {
            return $check;
        }
        $data['blogcategory'] = blogcategory::all();
        return view('admin.blog', $data);
    }
    public function addupdateblog(Request $request, $id = 0)
    {
        $data = $request->all();

        if (!empty($data) && $id == 0) {
            // 🔥 Check CREATE permission
            if (($check = $this->checkPermission('blog', 'can_create')) !== true) {
                return $check;
            }
            $insert = array(
                'title' => $data['title'],
                'url' => $data['url'],
                'category_id' => (isset($data['category_id']) ? $data['category_id'] : 0), // blog category id
                'content' => (isset($data['shortcontent']) ? $data['shortcontent'] : ''),
                'thumbnail_title' => $data['thumbnail_title'] ?? '',
                'thumbnail_alt' => $data['thumbnail_alt'] ?? '',
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'canonical_url' => $data['canonical_url'] ?? null,
                'keywords' => $data['keywords'] ?? null,
                'schema' => $data['schema'] ?? null,
                'status' => 0,
                'type' => 1,
                'date' => (isset($data['date']) ? date('d-m-Y',strtotime($data['date'])) : date('d-m-Y')),
            );
            $banner_image = $this->images($request, 'image', 'images/blog', 1);
            if (isset($banner_image[0])) {
                $insert['image'] = $banner_image[0];
            }
            $p_id = pages::create($insert)->id;

            $sec = 0;
            if (isset($data['secname']) && !empty($data['secname'])) {
                foreach ($data['secname'] as $k => $section) {
                    $section_insert = array(
                        'p_id' => $p_id,
                        'heading' => ($section != '' ? $section : null),
                        'sequence' => $sec++,
                        'sdate' => date('d-m-Y'),
                    );
                    $s_id = page_section::create($section_insert)->id;

                    $con = 0;
                    if (isset($data['content'][$k])) {
                        foreach ($data['content'][$k] as $ck => $content) {
                            $content = array(
                                's_id' => $s_id,
                                'content' => $content,
                                'sequence' => $con++,
                                'image' => '',
                                'cdate' => date('d-m-Y'),
                            );
                            page_content::create($content);
                        }
                    }
                    $path = public_path('/Assets/Admin/images/blog');
                    $randString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
                    if ($request->file('content_image')) {
                        $image = $request->file('content_image');
                        if (isset($image[$k]) && is_array($image)) {
                            foreach ($image[$k] as $key => $value) {
                                $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                                $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                                $filename = str_replace(' ', '-', $filename);
                                $value->move($path, $filename);

                                $insert_img = array(
                                    's_id' => $s_id,
                                    'content_image' => $filename,
                                    'image_alt' => $data['image_alt'][$k][$key],
                                    'image_title' => $data['image_title'][$k][$key],
                                    'content' => '',
                                    'sequence' => $con++,
                                    'cdate' => date('d-m-Y'),
                                );
                                page_content::create($insert_img);
                            }
                        }
                    }
                }
            }
            Cache::forget('latest_blogs');
            $this->flashmessage('Blog Inserted Successfully', 0);
            return redirect('/admin/blog');
        } else if (!empty($data) && $id != 0) {
            $blogRecord = pages::find($id);
            $update = array(
                'title' => $data['title'],
                'url' => $data['url'],
                'category_id' => (isset($data['category_id']) ? $data['category_id'] : 0), // blog category id
                'content' => (isset($data['shortcontent']) ? $data['shortcontent'] : ''),
                'thumbnail_title' => $data['thumbnail_title'] ?? '',
                'thumbnail_alt' => $data['thumbnail_alt'] ?? '',
                'meta_title' => $data['meta_title'],
                'meta_description' => $data['meta_description'],
                'canonical_url' => $data['canonical_url'] ?? null,
                'keywords' => $data['keywords'] ?? null,
                'schema' => $data['schema'] ?? null,
                'date' => (isset($data['date']) ? date('d-m-Y',strtotime($data['date'])) : date('d-m-Y')),
            );
            if ($request->hasFile('image')) {
                $main_image = $this->images($request, 'image', 'images/blog', 1);
                if (isset($main_image[0])) {
                    $newImage = $main_image[0];
                    if (!empty($blogRecord->image)) {
                        $oldImagePath = public_path('/Assets/Admin/images/blog/' . $blogRecord->image);
                        $oldThumbnailPath = public_path('/Assets/Admin/images/blog/thumbnails/' . $blogRecord->image);
    
                        // Delete old images if they exist
                        if (file_exists($oldImagePath)) {
                            unlink($oldImagePath);
                        }
                        if (file_exists($oldThumbnailPath)) {
                            unlink($oldThumbnailPath);
                        }
                    }
                    $update['image'] = $newImage;
                }
            }
            pages::where('id', $id)->update($update);

            $sec = 0;
            if (isset($data['secname']) && !empty($data['secname'])) {
                foreach ($data['secname'] as $k => $section) {
                    //section
                    if (isset($data['s_id'][$k])) {
                        $update_section = array(
                            'p_id' => $id,
                            'heading' => ($section != '' ? $section : null),
                            'sequence' => $sec++,
                        );
                        page_section::where('id', $data['s_id'][$k])->update($update_section);
                        $s_id = $data['s_id'][$k];
                    } else {
                        $section_insert = array(
                            'p_id' => $id,
                            'heading' => ($section != '' ? $section : null),
                            'sequence' => $sec++,
                            'sdate' => date('d-m-Y'),
                        );
                        $s_id = page_section::create($section_insert)->id;
                    }

                    $con = 0;
                    if (isset($data['c_id'][$k])) {
                        foreach ($data['c_id'][$k] as $ik => $iv) {
                            $con++;
                        }
                    } else {
                        $con = 0;
                    }
                    //content
                    if (isset($data['content'][$k])) {
                        foreach ($data['content'][$k] as $ck => $content) {
                            if (isset($data['c_id'][$k][$ck])) {
                                $update_content = array(
                                    's_id' => $s_id,
                                    'content' => $content != '' ? $content : null,
                                    'sequence' => $con++,
                                    'content_image' => '',
                                );
                                page_content::where('id', $data['c_id'][$k][$ck])->update($update_content);
                            } else {
                                $insert_content = array(
                                    'content' => $content != '' ? $content : null,
                                    's_id' => $s_id,
                                    'sequence' => $con++,
                                    'content_image' => '',
                                    'cdate' => date('d-m-Y'),
                                );
                                page_content::create($insert_content);
                            }
                        }
                    }

                    //image
                    $path = public_path('/Assets/Admin/images/blog');
                    $randString = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(10 / strlen($x)))), 1, 10);
                    if ($request->file('content_image')) {
                        $image = $request->file('content_image');
                        if (isset($image[$k]) && is_array($image)) {
                            foreach ($image[$k] as $key => $value) {
                                if (isset($data['c_id'][$k][$key])) {
                                    $existingContent = page_content::find($data['c_id'][$k][$key]);

                                    if ($existingContent && $existingContent->content_image) {
                                        $oldImagePath = $path . '/' . $existingContent->content_image;

                                        // Delete old image if it exists
                                        if (file_exists($oldImagePath)) {
                                            unlink($oldImagePath);
                                        }
                                    }
                                }

                                $filename = pathinfo($value->getClientOriginalName(), PATHINFO_FILENAME) . "_" . $randString . ".webp";
                                $filename = preg_replace('/[^a-z0-9\.]/i', "-", $filename);
                                $filename = str_replace(' ', '-', $filename);
                                $value->move($path, $filename);

                                if (isset($data['c_id'][$k][$key])) {
                                    $update_content = array(
                                        's_id' => $s_id,
                                        'content_image' => $filename,
                                        'image_alt' => $data['image_alt'][$k][$key],
                                        'image_title' => $data['image_title'][$k][$key],
                                        'content' => '',
                                    );
                                    page_content::where('id', $data['c_id'][$k][$key])->update($update_content);
                                } else {
                                    $insert_content = array(
                                        's_id' => $s_id,
                                        'content_image' => $filename,
                                        'image_alt' => $data['image_alt'][$k][$key],
                                        'image_title' => $data['image_title'][$k][$key],
                                        'content' => '',
                                        'sequence' => $con++,
                                        'cdate' => date('d-m-Y'),
                                    );
                                    page_content::create($insert_content);
                                }
                            }
                        }
                    }

                    $con = 0;
                    if (isset($data['c_id'][$k])) {
                        foreach ($data['c_id'][$k] as $ik => $iv) {
                            $update_content = array(
                                's_id' => $s_id,
                                'sequence' => $con++,
                                'image_alt' => $data['image_alt'][$k][$iv] ?? null,
                                'image_title' => $data['image_title'][$k][$iv] ?? null,
                            );
                            page_content::where('id', $iv)->update($update_content);
                        }
                    }
                }
            }
            Cache::forget('latest_blogs');
            $this->flashmessage('Blog Updated Successfully', 0);
            return redirect('/admin/blog');
        } elseif ($id != 0) {
            $data['fetchblogdata'] = pages::with([
                'blogcategory',
                'page_section.page_content'
            ])
                ->where('id', $id)
                ->first();
            $data['id'] = $id;

            $data['blogcategory'] = blogcategory::all();
            return view('admin.blogaddupdate', $data);
        }
        $data['blogcategory'] = blogcategory::all();
        return view('admin.blogaddupdate', $data);
    }
    public function blogajaxdata(Request $request)
    {
        $data = $request->input();
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowPerPage = $request->get("length");
        $orderArray = $request->get('order', []);
        $columnNameArray = $request->get('columns', []);
        $searchArray = $request->get('search', []);
        $columnIndex = isset($orderArray[0]['column']) ? $orderArray[0]['column'] : 0;
        $columnName = isset($columnNameArray[$columnIndex]['data']) ? $columnNameArray[$columnIndex]['data'] : 'id';
        $columnSortOrder = isset($orderArray[0]['dir']) ? $orderArray[0]['dir'] : 'asc';
        $searchValue = isset($searchArray['value']) ? $searchArray['value'] : '';

        $query = pages::with('blogcategory')->where('type', 1);

        if ($request->filled('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $daterange = $request->daterange;

        if (!empty($daterange)) {
            $dates = explode(' to ', $daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(pages.date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('title', 'like', '%' . $searchValue . '%')
                    ->orWhere('meta_title', 'like', '%' . $searchValue . '%')
                    ->orWhere('meta_description', 'like', '%' . $searchValue . '%')
                    ->orWhere('schema', 'like', '%' . $searchValue . '%')
                    ->orWhere('keywords', 'like', '%' . $searchValue . '%');
            });
        }

        $totalRecords = $query->count();
        // Apply sorting and pagination if rowPerPage is not -1
        if ($rowPerPage != -1) {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->offset($start)
                ->limit($rowPerPage)
                ->get();
        } else {
            $results = $query->orderBy($columnName, $columnSortOrder)
                ->get();
        }

        $newarr = [];
        if ($results->isNotEmpty()) {
            $i = 1;
            foreach ($results as $k => $value) {
                $checkbox = '<th>
                               <div class="form-check">
                                    <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $k . '" value="' . $value->id . '">
                                </div> 
                            </th>';

                if (hasPermission('blog', 'can_edit') || hasPermission('blog', 'can_delete')) {
                $action = '<div>';
                if (hasPermission('blog', 'can_edit')) {
                    $action .= '
                    <a href="' . url("admin/addupdateblog") . '/' . $value->id . '" class="btn mb-1 me-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center edit-btn" title="Edit Blog" data-bs-toggle="tooltip" data-bs-placement="top">
                        <i class="fa fa-pencil-alt" aria-hidden="true"></i>
                    </a>';
                }
                if (hasPermission('blog', 'can_delete')) {
                    $action .= '
                    <button data-id="' . $value->id . '" data-rownumber = "' . $i . '" class="btn mb-1 me-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata" data-table="pages" data-field="id" data-rownumber="' . $k . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Blog">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>';
                }
                $action .= '</div>';
                } else {
                    $action = '-';
                }

                $status = '';
                $status .= '<select class="select2 form-control form-select selstatus" data="' . $value->id . '" data-rownumber = "' . $i . '">
                                <option value="0" ' . ($value->status == 0 ? 'selected' : '') . ' >Active</option>
                                <option value="1" ' . ($value->status == 1 ? 'selected' : '') . ' >Inactive</option>
                            </select>';

                $img = '<a target="_blank" href="' . asset('public/Assets/Admin/images/blog') . '/' . ($value->image != '' ? $value->image : 'noimage.webp') . '">
                            <img src="' . asset('public/Assets/Admin/images/blog/thumbnails') . '/' . ($value->image != '' ? $value->image : 'noimage.webp') . '" height="80" loading="lazy">
                        </a>';

                $history = '<a href="' . url($value->url) . '" class="link-primary link-offset-2" target="_blank">' . $value->title . '</a>';

                $newarr[] = array(
                    'id' => $i++,
                    '' => $checkbox,
                    'title' => $history,
                    'url' => $value->url,
                    'image' => $img,
                    'category_id' => isset($value->blogcategory->blog_category_name) ? $value->blogcategory->blog_category_name : '-',
                    'thumbnail_title' => $value->thumbnail_title,
                    'thumbnail_alt' => $value->thumbnail_alt,
                    'meta_title' => $value->meta_title,
                    'meta_description' => $value->meta_description,
                    'schema' => $value->schema,
                    'keywords' => $value->keywords,
                    'canonical_url' => $value->canonical_url,
                    'date' => $value->date,
                    'status' => $status,
                    'action' => $action,
                );
            }
        }
        // Get filtered count
        $totalFiltered = $totalRecords;

        $response = array(
            "draw" => intval($draw),
            "recordsTotal" => $totalRecords,
            "recordsFiltered" => $totalFiltered,
            "data" => $newarr,
        );

        return response()->json($response);
    }
    public function blogstatus(Request $request)
    {
        $data = $request->all();
        $blog = pages::find($data['blogid']);
        if ($blog) {
            $blog->status = $data['status'];
            $blog->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    public function comment(Request $request, $id = 0)
    {
        $data = $request->input();
        if (count($data) > 0 && $id == 0) {
            $insert = array(
                'page_id' => 0,
                'name' => 'Admin',
                'email' => '',
                'website' => '',
                'comment' => $data['reply'],
                'status' => 1,
                'reply_id' => $data['comment_id'],
                'c_date' => date('d-m-Y'),
            );
            comment::create($insert);
            $this->flashmessage('Reply Inserted successfully', 0);
            return redirect('/admin/comment');
        }
        return view('admin.blogcomment', $data);
        
    }
    public function commentajaxdata(Request $request)
    {
        $query = comment::with('pages')
            ->where('reply_id', 0)
            ->orderBy('id', 'DESC');

        if ($request->filled('daterange')) {
            $dates = explode(' to ', $request->daterange);
            $startDate = isset($dates[0]) ? date('Y-m-d', strtotime($dates[0])) : null;
            $endDate = isset($dates[1]) ? date('Y-m-d', strtotime($dates[1])) : null;

            if ($startDate && $endDate) {
                $query->whereBetween(DB::raw("STR_TO_DATE(c_date, '%d-%m-%Y')"), [$startDate, $endDate]);
            }
        }

        $comment = $query->get();

        $reply = [];
        foreach ($comment as $k => $v) {
            // Load the first reply comment for each comment
            $reply[$k] = comment::where('reply_id', $v['id'])->first();
        }
        $i = 1;
        $data = [];
        foreach ($comment as $key => $value) {
            $pageUrl = $value->pages ? $value->pages->url : '';

            $action = '';
            $action .= '<a data="' . $value->id . '" class="reply btn mb-1 me-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center"  title="Reply Comment" data-bs-toggle="tooltip" data-bs-placement="top">
                <i class="fa fa-reply-all" aria-hidden="true"></i>
            </a>';

            $action .= '<a href="' . url($pageUrl) . '" target="_blank" class="btn mb-1 me-1 btn-primary btn-sm d-inline-flex align-items-center justify-content-center" title="View Blog" data-bs-toggle="tooltip" data-bs-placement="top">
                <i class="fa fa-eye" aria-hidden="true"></i>
            </a>';

            $action .= '<button data-id="' . $value->id . '" data-rownumber = "' . $i . '" class="btn mb-1 me-1 btn-danger btn-sm d-inline-flex align-items-center justify-content-center deletedata" data-table="comment" data-field="id" data-rownumber="' . $k . '" data-value="' . $value->id . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Comment">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </button>';

            $status = '';
            $status .= '<select class="select2 form-control form-select selectcommentstatus" data="' . $value->id . '" data-rownumber = "' . $i . '">
                            <option value="0" ' . ($value->status == 0 ? 'selected' : '') . ' >Active</option>
                            <option value="1" ' . ($value->status == 1 ? 'selected' : '') . ' >Inactive</option>
                        </select>';

            $checkbox = '<th>
                <div class="form-check">
                    <input class="form-check-input alldatachecks_999" type="checkbox" id="flexCheckDefault" name="alldatachecks" data-rownumber = "' . $k . '" value="' . $value->id . '">
                </div> 
            </th>';

            $data[] = array(
                $i++,
                $checkbox,
                $value->name,
                $value->email,
                $value->website,
                $value->comment,
                (isset($reply[$key]['comment']) ? $reply[$key]['comment'] : ''),
                $status,
                $action
            );
        }
        $result = array(
            "data" => $data
        );
        echo json_encode($result);
        exit();
    }
    public function blogcommentstatus(Request $request)
    {
        $data = $request->all();
        $blogcomment = comment::find($data['commentid']);
        if ($blogcomment) {
            $blogcomment->status = $data['status'];
            $blogcomment->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 400);
    }
    // -------------------------------------------  Blog module end ---------------------------------------------------------

}

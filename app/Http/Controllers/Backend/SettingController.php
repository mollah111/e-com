<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function showSettings ()
    {
        $generalSettings = SiteSetting::first();
        return view('backend.settings.general-settings', compact('generalSettings'));
    }

    public function updateSettings (Request $request)
    {
        $generalSettings = SiteSetting::first();

        $generalSettings->phone = $request->phone;
        $generalSettings->email = $request->email;
        $generalSettings->address = $request->address;
        $generalSettings->facebook = $request->facebook;
        $generalSettings->twitter = $request->twitter;
        $generalSettings->instagram = $request->instagram;
        $generalSettings->youtube = $request->youtube;

        if(isset($request->logo)){
            if($generalSettings->logo && file_exists('backend/images/setting/'.$generalSettings->logo)){
                unlink('backend/images/setting/'.$generalSettings->logo);
            }
            $imageName = rand().'-logo-'.'.'.$request->logo->extension();
            $request->logo->move('backend/images/setting/',$imageName);

            $generalSettings->logo = $imageName;
        }

        if(isset($request->banner)){
            if($generalSettings->banner && file_exists('backend/images/setting/'.$generalSettings->banner)){
                unlink('backend/images/setting/'.$generalSettings->banner);
            }
            $bannerName = rand().'-banner-'.'.'.$request->banner->extension();
            $request->banner->move('backend/images/setting/',$bannerName);

            $generalSettings->banner = $bannerName;
        }

        $generalSettings->save();
        return redirect()->back();
    }

    public function showBanners ()
    {
        $banners = Banner::get();
        return view('backend.settings.banners', compact('banners'));
    }

    public function editBanner ($id)
    {
        $banner = Banner::find($id);
        return view('backend.settings.banner-edit', compact('banner'));
    }

    public function updateBanners (Request $request, $id)
    {
        $banner = Banner::find($id);

        if(isset($request->banner_image)){
            if($banner->banner_image && file_exists('backend/images/setting/'.$banner->banner_image)){
                unlink('backend/images/setting/'.$banner->banner_image);
            }
            $bannerName = rand().'-banner-'.'.'.$request->banner_image->extension();
            $request->banner_image->move('backend/images/setting/',$bannerName);

            $banner->banner_image = $bannerName;
        }

        $banner->save();
        return redirect('admin/top-banners');
    }
}

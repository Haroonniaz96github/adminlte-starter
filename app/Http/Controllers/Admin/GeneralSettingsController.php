<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GeneralSettingsController extends Controller
{
    public function smtp_settings()
    {
        return view('admin.general_settings.smtp_settings');
    }

    public function update_smtp_settings(Request $request)
    {
        $this->validate($request, [
            'site_smtp_mail_host' => 'required|string',
            'site_smtp_mail_port' => 'required|string',
            'site_smtp_mail_username' => 'required|string',
            'site_smtp_mail_password' => 'required|string',
            'site_smtp_mail_encryption' => 'required|string',
            'site_smtp_mail_address' => 'required|string'
        ]);

        update_static_option('site_smtp_mail_host', $request->site_smtp_mail_host);
        update_static_option('site_smtp_mail_port', $request->site_smtp_mail_port);
        update_static_option('site_smtp_mail_username', $request->site_smtp_mail_username);
        update_static_option('site_smtp_mail_password', $request->site_smtp_mail_password);
        update_static_option('site_smtp_mail_encryption', $request->site_smtp_mail_encryption);
        update_static_option('site_smtp_mail_address', $request->site_smtp_mail_address);

        setEnvValue([
            'MAIL_HOST' => $request->site_smtp_mail_host,
            'MAIL_PORT' => $request->site_smtp_mail_port,
            'MAIL_USERNAME' => $request->site_smtp_mail_username,
            'MAIL_PASSWORD' => $request->site_smtp_mail_password,
            'MAIL_ENCRYPTION' => $request->site_smtp_mail_encryption,
            'MAIL_ENCRYPTION' => $request->site_smtp_mail_address
        ]);

        Session::flash('success_message', 'Great! SMTP Setting has been saved successfully!');
        return redirect()->back();
    }

    public function site_identity()
    {
        return view('admin.general_settings.site_identity');
    }

    public function update_site_identity(Request $request)
    {
        $this->validate($request, [
            'site_logo' => 'nullable|string|max:191',
            'site_favicon' => 'nullable|string|max:191',
            'site_white_logo' => 'nullable|string|max:191',
        ]);
        update_static_option('site_logo', $request->site_logo);
        update_static_option('site_favicon', $request->site_favicon);
        update_static_option('site_white_logo', $request->site_white_logo);
       
        Session::flash('success_message', 'Great! Site Setting has been saved successfully!');
        return redirect()->back();
    }
}

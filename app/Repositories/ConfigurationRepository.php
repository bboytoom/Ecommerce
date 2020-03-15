<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Events\LogoUpdated;

class ConfigurationRepository
{
    public function updateConfiguration(Request $request, $id)
    {
        $data = $request->except(['type', 'base']);
        $configuration = Configuration::find($id);

        if(is_null($configuration)) {
            return 422;
        }

        if (!is_null($request->base)) {
            event(new LogoUpdated($configuration->id, $configuration->logo, $request->base, $request->type));
        }

        Configuration::where('id', $configuration->id)->update([
            'domain' => e(strtolower($data['domain'])),
            'name' => e(strtolower($data['name'])),
            'business_name' => e(strtolower($data['business_name'])),
            'slogan' => empty($data['slogan']) ? '' : e(strtolower($data['slogan'])),
            'email' => e(strtolower($data['email'])),
            'phone' => e(strtolower($data['phone'])),
            'status' => 1
        ]);

        return 200;
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroSettingController extends Controller
{
    public function edit()
    {
        $hero = HeroSetting::firstOrCreate([]);

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $hero = HeroSetting::firstOrCreate([]);

        $validated = $request->validate([
            'eyebrow' => ['required', 'string', 'max:255'],

            'heading_line_1' => ['required', 'string', 'max:255'],
            'heading_line_2' => ['required', 'string', 'max:255'],
            'heading_line_3' => ['required', 'string', 'max:255'],

            'description' => ['required', 'string'],

            'button_text' => ['required', 'string', 'max:100'],
            'button_url' => ['required', 'string', 'max:255'],

            'feature_one' => ['required', 'string', 'max:100'],
            'feature_two' => ['required', 'string', 'max:100'],

            'image_alt' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        unset($validated['image']);

        if ($request->hasFile('image')) {
            // Remove the previous image when replacing it.
            if ($hero->image_path) {
                Storage::disk('public')->delete($hero->image_path);
            }

            $validated['image_path'] = $request->file('image')
                ->store('hero', 'public');
        }

        $hero->update($validated);

        return redirect()
        ->route('admin.hero.edit')
        ->with('sonner', [
            'type' => 'success',
            'message' => 'Hero section updated successfully!',
        ]);
    }
}

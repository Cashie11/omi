<?php

namespace Database\Seeders;

use App\Models\Consultant;
use App\Models\GalleryImage;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedAdmin();
        $this->seedSettings();
        $this->seedConsultants();
        $this->seedGallery();
    }

    private function seedAdmin(): void
    {
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@omisewatemple.com')],
            [
                'name' => env('ADMIN_NAME', 'Temple Administrator'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'ChangeMeNow123!')),
            ]
        );
    }

    private function seedSettings(): void
    {
        $settings = [
            'site_name' => 'Omisewa Temple',
            'footer_tagline' => 'Traditional spiritual consultation, guidance, and insight.',
            'hero_heading' => 'SPIRITUAL CONSULTATIONS',
            'hero_subtext' => 'For guidance, clarity, spiritual insight, and personal consultations.',
            'hero_button_text' => 'Contact the Temple',
            'home_intro_title' => 'Welcome to Omisewa Temple',
            'home_intro_text' => "Omisewa Temple is a place for calm and honest spiritual guidance. We welcome anyone who seeks clarity about their life, their family, or their path forward.\n\nOur consultations are rooted in Isese, the traditional spiritual practice of the Yoruba people. We listen first, then offer insight with care and respect.",
            'about_heading' => 'About Omisewa Temple',
            'about_text' => "Omisewa Temple offers traditional spiritual consultation in the Yoruba tradition of Isese. We provide a calm, private space for people who want guidance, clarity, and spiritual insight.\n\nA consultation is a conversation. You are welcome to bring your questions about life, family, relationships, work, or your spiritual path. We listen carefully and offer the insight we are able to give.\n\nWhat to expect\nA consultation is private and unhurried. You will be met with respect and without judgement. We offer honest guidance, not promises. You remain free to make your own choices.\n\nWe do not offer medical, legal, or financial advice, and we do not promise any particular result. Our work is to help you see clearly and find your own way forward.",
            'opening_hours' => 'Monday to Saturday, 9am to 5pm',
            'phone_call' => '',
            'phone_whatsapp' => '',
            'contact_email_primary' => 'AdeOdo@omisewatemple.com',
            'contact_email_secondary' => 'Osungbemi@omisewatemple.com',
            'address' => '',
            'map_embed_url' => '',
        ];

        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }

    private function seedConsultants(): void
    {
        $consultants = [
            ['name' => 'Chief Mrs. Morenike Alade Odo OmoLight, Osungbemi Omisewa gbogbo Agbaye', 'sort_order' => 1],
            ['name' => 'Yeye Olokun Leguru of Akile Ijebu', 'sort_order' => 2],
            ['name' => 'The Iyalode Isese of Ogun State', 'sort_order' => 3],
            ['name' => 'Obabinrin Alade Oodo Ase Oluweri Isembaye Agbaye', 'sort_order' => 4],
        ];

        foreach ($consultants as $data) {
            Consultant::updateOrCreate(
                ['name' => $data['name']],
                ['sort_order' => $data['sort_order']]
            );
        }
    }

    private function seedGallery(): void
    {
        $images = [
            ['images/gallery/cowries.jpg', 'Cowries', 1],
            ['images/gallery/cowrie-shells.jpg', 'Cowrie shells', 2],
            ['images/gallery/candlelight.jpg', 'Candlelight', 3],
            ['images/gallery/incense.jpg', 'Incense', 4],
            ['images/gallery/meditation.jpg', 'Meditation', 5],
            ['images/gallery/candles.jpg', 'Candles', 6],
        ];

        foreach ($images as [$path, $caption, $order]) {
            if (file_exists(public_path($path))) {
                GalleryImage::firstOrCreate(
                    ['path' => $path],
                    ['caption' => $caption, 'sort_order' => $order]
                );
            }
        }
    }
}

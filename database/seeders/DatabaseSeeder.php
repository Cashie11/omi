<?php

namespace Database\Seeders;

use App\Models\Consultant;
use App\Models\Faq;
use App\Models\GalleryImage;
use App\Models\Service;
use App\Models\Setting;
use App\Models\TeachingTopic;
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
        $this->seedServices();
        $this->seedTeachings();
        $this->seedFaqs();
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
            'founder_bio' => "Omisewa is a spiritual practitioner and guide dedicated to helping individuals seek clarity, understanding and spiritual direction through her practice.\n\nThere are moments in life when we seek clarity, direction and a deeper understanding of our path.",
            'hero_heading' => 'SPIRITUAL CONSULTATIONS',
            'hero_subtext' => 'For guidance, clarity, spiritual insight, and personal consultations.',
            'hero_button_text' => 'Contact the Temple',
            'home_intro_title' => 'Welcome to Omisewa Temple',
            'home_intro_text' => "Omisewa Temple is a place for calm and honest spiritual guidance. We welcome anyone who seeks clarity about their life, their family, or their path forward.\n\nOur consultations are rooted in Isese, the traditional spiritual practice of the Yoruba people. We listen first, then offer insight with care and respect.",
            'about_heading' => 'About Omisewa Temple',
            'about_text' => "Omisewa Temple offers traditional spiritual consultation in the Yoruba tradition of Isese. We provide a calm, private space for people who want guidance, clarity, and spiritual insight.\n\nA consultation is a conversation. You are welcome to bring your questions about life, family, relationships, work, or your spiritual path. We listen carefully and offer the insight we are able to give.\n\nWhat to expect\nA consultation is private and unhurried. You will be met with respect and without judgement. We offer honest guidance, not promises. You remain free to make your own choices.\n\nWe do not offer medical, legal, or financial advice, and we do not promise any particular result. Our work is to help you see clearly and find your own way forward.",
            'opening_hours' => 'Monday to Saturday, 9am to 5pm',
            'phone_call' => '+2348066238134',
            'phone_whatsapp' => '+2348066238134',
            'social_tiktok' => 'https://www.tiktok.com/@adeodoosungbemi',
            'contact_email_primary' => 'AdeOdo@omisewatemple.com',
            'contact_email_secondary' => 'Osungbemi@omisewatemple.com',
            'address' => 'Akeem Shobowale, Wisdom Height Estate, Isheri OPIC',
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

    private function seedServices(): void
    {
        $services = [
            [
                'title' => 'Spiritual Consultation',
                'slug' => 'spiritual-consultation',
                'summary' => 'Private, one-to-one guidance for clarity, direction, and spiritual insight.',
                'what_is' => 'A spiritual consultation is a private conversation about your life, your questions, and your path. Omisewa listens carefully and offers guidance and spiritual insight rooted in the Yoruba tradition of Isese.',
                'who_for' => 'Anyone who feels stuck, uncertain, or in need of direction. People come for guidance about life, family, relationships, work, purpose, or their spiritual path.',
                'what_happens' => 'You are welcomed into a calm, private space. Omisewa listens to your questions, then shares the insight and guidance she is able to offer. You remain free to make your own choices.',
                'duration' => '60 minutes',
                'sort_order' => 1,
            ],
            [
                'title' => 'Online Consultation',
                'slug' => 'online-consultation',
                'summary' => 'The same private guidance, held online from wherever you are.',
                'what_is' => 'An online consultation is the same private conversation, held over a call or video call when you cannot visit in person.',
                'who_for' => 'Anyone who would like guidance but cannot easily travel to the temple.',
                'what_happens' => 'You connect with Omisewa online. She listens to your questions and shares the insight and guidance she is able to offer.',
                'duration' => '60 minutes',
                'sort_order' => 2,
            ],
            [
                'title' => 'Dream Interpretation',
                'slug' => 'dream-interpretation',
                'summary' => 'Understanding the messages and guidance that come through your dreams.',
                'what_is' => 'Dream interpretation explores the meaning and guidance that can come through your dreams.',
                'who_for' => 'Anyone who has had dreams they would like to understand, or who feels their dreams carry a message.',
                'what_happens' => 'You share your dream with Omisewa, and she offers the insight she is able to give.',
                'duration' => '45 minutes',
                'sort_order' => 3,
            ],
            [
                'title' => 'Ancestral Guidance',
                'slug' => 'ancestral-guidance',
                'summary' => 'Honouring and seeking wisdom from your ancestors.',
                'what_is' => 'Ancestral guidance honours the wisdom passed down through your family line.',
                'who_for' => 'Anyone seeking to connect with, honour, or seek guidance from their ancestors.',
                'what_happens' => 'Omisewa guides you in honouring your ancestors and shares the wisdom that comes through.',
                'duration' => '60 minutes',
                'sort_order' => 4,
            ],
        ];

        foreach ($services as $data) {
            Service::updateOrCreate(['slug' => $data['slug']], $data);
        }
    }

    private function seedTeachings(): void
    {
        $topics = [
            ['Spirituality', 'Guidance for your spiritual life and inner growth.'],
            ['Yorùbá Tradition', 'Wisdom from the traditional practice of Isese.'],
            ['Ộșun', 'Teachings connected to Ộșun and her qualities.'],
            ['Personal Growth', 'Support as you grow and become clearer about your path.'],
            ['Relationships', 'Guidance for family, friendship, and partnership.'],
            ['Purpose', 'Help in finding and walking your own path.'],
            ['Dreams', 'Understanding the messages that come through dreams.'],
            ['Spiritual Practices', 'Simple practices to support your spiritual life.'],
            ['Ancestral Wisdom', 'Honouring the wisdom passed down through generations.'],
        ];

        foreach ($topics as $index => [$title, $summary]) {
            TeachingTopic::updateOrCreate(
                ['title' => $title],
                ['summary' => $summary, 'sort_order' => $index + 1]
            );
        }
    }

    private function seedFaqs(): void
    {
        $faqs = [
            ['Who is Omisewa?', 'Omisewa is a spiritual practitioner and guide dedicated to helping people seek clarity, understanding, and spiritual direction.'],
            ['What kind of guidance does she provide?', 'She offers guidance on life, family, relationships, purpose, and spiritual matters, rooted in the Yoruba tradition of Isese.'],
            ['Do I need to visit the temple?', 'You are welcome to visit the temple, and online consultations are also available.'],
            ['Can I have an online consultation?', 'Yes, online consultations can be arranged. Contact the temple to set one up.'],
            ['How do I book a session?', 'Use the booking page on this website, or contact the temple directly by phone, WhatsApp, or email.'],
            ['How much does a consultation cost?', 'Please contact the temple for current fees. We are glad to share the details with you.'],
            ['How long does a session last?', 'A standard consultation lasts about 60 minutes. Longer or shorter sessions can be arranged.'],
            ['Is my session confidential?', 'Yes. Consultations are private and treated with respect and confidentiality.'],
            ['Can someone book on behalf of another person?', 'Yes, you may book for someone else. Please share their details and the reason for the booking.'],
            ['Can I visit the temple without an appointment?', 'It is best to book in advance so we can give you our full attention. Contact us to arrange a time.'],
            ['What should I bring when visiting?', 'Just bring yourself and an open mind. You may also bring any questions you would like to discuss.'],
        ];

        foreach ($faqs as $index => [$question, $answer]) {
            Faq::updateOrCreate(
                ['question' => $question],
                ['answer' => $answer, 'sort_order' => $index + 1]
            );
        }
    }
}

<?php

// Pastikan Anda sudah menginstall library Pusher PHP di server Anda.
// Jika belum, jalankan perintah ini di terminal: composer require pusher/pusher-php-server:~7.0

require __DIR__ . '/vendor/autoload.php';

$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
);
$pusher = new Pusher\Pusher(
    '7c70c4ffc89d38e8b112f997', // Ini adalah App Key dari dashboard Pusher Anda
    'f4c7b6f658d38e8b112f997', // Ini adalah Secret Key dari dashboard Pusher Anda
    '2031861',                  // Ini adalah App ID dari dashboard Pusher Anda
    $options
);

// Data berita yang ingin Anda kirim
// Anda bisa mengganti nilai-nilai ini dengan data berita yang sebenarnya
// Misalnya, dari database atau formulir admin
$data['article'] = [
    'title' => 'Bitcoin Melejit, Tembus Level Tertinggi Baru!',
    'summary' => 'Harga Bitcoin melonjak di atas $70,000 setelah investor institusional menunjukkan minat yang kuat.',
    'image_url' => 'https://images.unsplash.com/photo-1621532130768-450f3b43831d?q=80&w=2070&auto=format&fit=crop',
    'link' => 'https://www.google.com/search?q=berita+bitcoin', // Ganti dengan URL berita yang valid
    'date' => date('d F Y')
];

// Perintah untuk mengirim event ke Pusher
// 'news-channel' adalah nama channel yang Anda gunakan di index.html
// 'new-article' adalah nama event yang Anda dengarkan di index.html
$pusher->trigger('news-channel', 'new-article', $data);

echo "Berita berhasil dikirim ke Pusher!";

?>

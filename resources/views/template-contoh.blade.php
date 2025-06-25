@php
$pageTitle = "Selamat Datang ke Laman Web Kami";

$senaraiKakitangan = \Illuminate\Support\Facades\DB::table('users')->get();
@endphp

<h1>
    <?php echo $pageTitle; ?>
</h1>

<h1>
    {{ $pageTitle }}
</h1>

<h1>
    {!! $pageTitle !!}
</h1>

<!-- Komen dalam HTML -->
<?php
// Komen dalam PHP
# Komen dalam PHP
/* Komen dalam PHP yang lebih panjang
   boleh ditulis di sini.
*/
?>
{{-- Ini comment dalam blade --}}


<hr>

@foreach ($senaraiKakitangan as $kakitangan)
    <div class="kakitangan">
        <h3>{{ $kakitangan->name }}</h3>
    </div>
@endforeach
@props([
    'n_title',
    'n_content',
    'n_author',
    'n_author_id',
    'n_date'
])
<br>
<input type="radio" name="accordion" id="cb{{ $n_title }}" />
<section class="box">
    <label class="box-title" for="cb{{ $n_title }}">{{ $n_title }}</label>
    <label class="box-close" for="acc-close"></label>
    <div class="box-content">{{ $n_content }}<br><b> <a href="{{ route('abtuser', ['n_author_id' => $n_author_id]) }}">by:  {{ $n_author }}</a></b><br><b>date: {{ $n_date }}</b></div>
</section>
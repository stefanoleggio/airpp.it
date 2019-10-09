@extends('templates.page')
@section('content')
    @include('includes.photobanner', 
        [
            'title' => $album[0]->title,
            'description' => $album[0]->description,
            'img' => '/media/svg/photos_photo.svg'
        ])
    <div class="gallery u-padding-normal u-bgcolor-color-grey">
        <div class="slideshow-container">
            @foreach($photos as $photo)
            <div class="mySlides">
                <img src="{{ $photo->img_path }}" alt="">
            </div>       
            @endforeach
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>
    <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
        showSlides(slideIndex += n);
        }

        function currentSlide(n) {
        showSlides(slideIndex = n);
        }

        function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        if (n > slides.length) {slideIndex = 1}    
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slides[slideIndex-1].style.display = "block";  
        }
</script>
@endsection
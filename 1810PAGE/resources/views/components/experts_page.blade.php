<div class="myexpert inline-block" style="width:700px; height:300px; margin: 5px; margin-left:3%; margin-top:5%">
    <div class="inline-block float-left">
        <div class="inline-block w-3/6" style="margin-left: 10%;">
            <strong class="inline-block"> {{ $author }} </strong><br>
            <em class="inline-block"> {{ $text }} </em><br>
        </div>
        <div class="inline-block float-left" style="width:250px ">
            <img class="h-72 rounded-3xl inline-block mt-4 ml-2" style="width: 250px; height:250px;" src="{{ $photourl }}">
        </div>
    </div>
</div>
<style>
    .myexpert {
        padding: 5px;
        border: 2px solid #000;
        /* Black border with a width of 1px */
        border-radius: 10px;
        /* Adjust the value to control the roundness of corners */
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.5);
        /* Black shadow with a 5px horizontal and vertical offset and a 10px blur radius */
    }
</style>
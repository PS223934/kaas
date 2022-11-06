@extends("template.app")

@section("content")
    <form method="POST" action="{{ route('update', $kaas->id) }}">
        @csrf   
        @method('put')

        <div class="w-full bg-white rounded-lg shadow-xl">
            <input id="ctitle" name="name" type="text" class="maininput titleinput text-6xl p-0 cheese text-yellow-600 text-center border-b border-solid border-gray-300 w-full" value="{{ $kaas->name }}"></input>
            <div class="p-4">
                <h2 class="text-4xl text-left margin-1 mb-5">Origin: <input id="corigin" name="origin" type="text" class="maininput cheese text-yellow-600 text-5xl" value="{{ $kaas->origin }}"></input></h2>
                <textarea id="cdescription" name="description" class="maininput text-2xl w-full text-left margin-1">{{ $kaas->description }}</textarea>
            </div>
        </div>
        
        <div class="spinbtnhidden spinbtndefault bottombuttons flex border-solid border-1 border-black fixed bottom-5 right-5">
            <div class="outerbtn outersubmit absolute"></div>
            <button class="submitbtn">
                <p class="submitbtncontent">&#10003;</p>
            </button>
            <div onclick="document.forms[0].submit();" onmouseover="btnspin('in','altspinbtn', 'submit')" onmouseleave="btnspin('out','altspinbtn', 'submit')" class="innerbtn innerbtnsubmit absolute p-1"></div>
        </div>
    </form>

    <div class="exitbuttons flex border-solid border-1 border-black fixed bottom-5 left-5">
        <div class="outerbtn outerexit absolute"></div>
        <button class="exitbtn">
            <p class="exitbtncontent">&larr;</p>
        </button>
        <div onmouseover="btnspin('in', 'canspinbtn', 'exit')" onmouseleave="btnspin('out', 'canspinbtn', 'exit')" onclick="r(`{{route('index')}}`)" class="innerbtn innerbtnexit absolute p-1"></div>
    </div>
@endsection
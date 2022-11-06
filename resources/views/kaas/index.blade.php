@extends("template.app")
@section("content")
    <div class="w-full bg-white rounded-lg shadow-xl top-0 fixed">
@if ($specific)     
<!-- checking if the user is requesting a specific item -->
    @if ($specific != "ITEM_NOT_EXIST")
    <!-- checking if the item exists (reference function validateData()) -->
            <h1 class="text-6xl cheese text-yellow-600 text-center border-b border-solid border-gray-300">{{$specific->name}}</h1>
            <div class="p-4">
                <h2 class="text-4xl text-left margin-1 mb-5">Origin: <span class="cheese text-yellow-600 text-5xl">{{$specific->origin}}</span></h2>
                <p class="text-2xl text-left margin-1">{{$specific->description}}</p>
            </div>
        </div>
        <form action="{{ route('edit', $specific->id) }}" method="get">
            <div class="bottombuttons flex border-solid border-1 border-black fixed bottom-5 right-5">
                <div class="outerbtn outeredit absolute"></div>
                <button class="editbtn">
                    <p class="editbtncontent">&#9998;</p>
                </button>
                <div onclick="document.forms[0].submit();" onmouseover="btnspin('in', 'spinbtn', 'edit')" onmouseleave="btnspin('out', 'spinbtn', 'edit')" class="innerbtn absolute p-1"></div>
            </div>
        </form>
        <div class="exitbuttons flex border-solid border-1 border-black fixed bottom-5 left-5">
            <div class="outerbtn outerexit absolute"></div>
            <button class="exitbtn">
                <p class="exitbtncontent">&larr;</p>
            </button>
            <div onmouseover="btnspin('in', 'canspinbtn', 'exit')" onmouseleave="btnspin('out', 'canspinbtn', 'exit')" onclick="r(`{{route('index')}}`)" class="innerbtn innerbtnexit absolute p-1"></div>
        </div>
    @else
    <!-- if the item doesn't exist, the user will be redirected to the create page -->
            <script>
                window.location.href = "/create?kaas={{request()->query('kaas')}}";
            </script>
        </div>
    @endif
@else
<!-- if the user is not requesting a specific item, the user will be shown an index of all existing items -->
        <h1 class="text-6xl cheese text-yellow-600 text-center border-b border-solid border-gray-300 bg-white shadow-lg z-1">Alle kazen</h1>
    </div>

    <div class="flex justify-center flex-col z-0">
        <ul class="divide-y-2 kaascontainer divide-gray-400">
        @foreach ($kazen as $kaas)
            <a data-id="{{ $kaas->id }}" class="mainhref-{{$kaas->id}} w-full z-1" href="?kaas={{ $kaas->name }}">
                <li class="listitem flex listitem-{{$kaas->id}} justify-between hover:bg-yellow-600 hover:text-yellow-100 border-b border-b-2 border-gray-200">
                    <div class="listitem listdiv-{{$kaas->id}} w-full h-full p-3">
                        {{ $kaas->name }}
                    </div>
                    <div data-id="{{ $kaas->id }}" name="{{ $kaas->name }}" class="deletediv deletediv-{{$kaas->id}} z-2 absolute right-0 bg-red-600">
                        <img class="delbtn" src="{{asset('rsrc/cross.svg')}}" alt="delete"></svg>
                    </div>
                </li>
            </a>
        @endforeach
        </ul>
    </div>

    <div class="bottombuttons flex border-solid border-1 border-black fixed bottom-5 right-5">
        <div class="outerbtn outeradd absolute" ></div>
        <button class="addbtn">
            <p class="addbtncontent">+</p>
        </button>
        <div onmouseover="btnspin('in', 'spinbtn', 'add')" onmouseleave="btnspin('out', 'spinbtn', 'add')" onclick="r(`{{route('create')}}`)" class="innerbtn absolute p-1"></div>
    </div>

    <div class="undohidden spinbtnhidden fixed spinbtndefault bottombuttons flex border-solid border-1 border-black bottom-5 right-24">
        <div class="outerbtn outerundo absolute"></div>
        <button class="undobtn">
            <p class="undobtncontent outerundo">&#8635;</p>
        </button>
        <div id="undobtn" onmouseover="btnspin('in', 'spinbtn', 'undo')" onmouseleave="btnspin('out', 'spinbtn', 'undo')" class="innerbtn absolute p-1"></div>
    </div>

    <!-- the following script contains the "logic" for deleting and reviving elements -->
    <script type="text/javascript">
        $.wait = function( callback, seconds){
            return window.setTimeout( callback, seconds * 1000 );
        }
        
        $(".deletediv").on("mouseover", function() {         //nulls the href of the <a> that covers the whole list item
            var id = $(this).attr("data-id");                //this is done so the user can't click the list item while hovering over the delete button.
            $(".mainhref-"+id).attr("href", "javascript:void(0)");
        });
        
        $(".deletediv").on("mouseleave", function() {       //sets the href of the <a> back to the original href.
            var id = $(this).attr("data-id");
            var name = $(this).attr("name");
            var string = "/kaas?kaas="+name;
            $(".mainhref-"+id).attr("href", string);
        });
        
        $(".deletediv").on("click", function() {         //deletes most elements and destroys the object in the database.
            var id = $(this).attr("data-id");
            $.ajax({                                     //ajax request to the destroy function in the controller.
                url: "{{ route('kaas.destroy') }}",
                data: {"id": id,"_token": "{{ csrf_token() }}"},
                type: 'post',
                success: function(result){
                    var cur_listitem = $(".listitem-"+id)
                    $(".undohidden").removeClass('spinbtnhidden hidden');
                    $(".undohidden").attr('data-id', id);
                    $(".deletediv-"+id).addClass("deleteAnimation absolute");
                    $.wait( function() {
                        $(".listdiv-"+id).remove();
                        $(".listdiv-"+id).addClass("deleteListAnimation");
                    },0.3);
                    $.wait( function() {
                        cur_listitem.remove();
                        $(".mainhref-"+id).remove();
                    },0.5);
                }
            });
        });

        $("#undobtn").on("click", function() {         //revives the last deleted object in the database.
            var id = $(".undohidden").attr("data-id");
            $.ajax({ 
                url: "{{ route('kaas.undo') }}",
                data: {"id": id,"_token": "{{ csrf_token() }}"},
                type: 'post',
                success: function(result){
                    location.reload();
                }
            });
        });
        
        //i use ajax to prevent a page reload and flawlessly remove elements from the page.
    </script>
@endif
@endsection
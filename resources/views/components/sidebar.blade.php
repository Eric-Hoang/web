<div class="col-md-3" style="background-color: #EEEEEE">
    <div class="form-group row">
        <div class="input-group flex-nowrap">
            <div class="input-group-prepend">
                <span class="input-group-text" id="addon-wrapping">
                    <i class="fas fa-search"></i>
                </span>
            </div>
            <form action="/search">
                <input type="text" name="q" class="form-control" placeholder="Search..." aria-label="Username"
                    aria-describedby="addon-wrapping">
            </form>
        </div>
        <div class="list-group btn-block" style="margin-top: 1rem;">
            @php
            $categories = App\Models\Category::all();
            @endphp
            <div class="list-group-item list-group-item-action active d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px" aria-current="true">
                <i class="fas fa-home fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class="fa-lg d-block" style="margin-top: .3rem"> Home </span>
                </div>
            </div>
            @foreach ($categories as $category)
            <a href="{{ route('categories.show', $category->id) }}"
                class="list-group-item list-group-item-action  d-flex align-items-center "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: 0.25rem"
                aria-current="true">
                <i class="fas {{ $category->icon }} fa-lg"></i>
                <div class="ml-3 d-flex align-items-center justify-content-between w-100">
                    <span class="" style="margin-top: .15rem"> {{ $category->name }} </span>
                    @role('admin')
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                    @endrole
                </div>
            </a>
            @endforeach
            <a href="{{ route('apps.most-free-download') }}" class="list-group-item list-group-item-action d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: .15rem"
                aria-current="true">
                <i class="fas fa-download fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class=" d-block" style="margin-top: .3rem">Most Free Dowload</span>
                </div>
            </a>
            <a href="{{ route('apps.most-paid-download') }}" class="list-group-item list-group-item-action d-flex "
                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px;margin-top: .15rem"
                aria-current="true">
                <i class="fas fa-hand-holding-usd fa-lg d-flex align-items-center"></i>
                <div class="ml-3">
                    <span class=" d-block" style="margin-top: .3rem">Most Paid Download</span>
                </div>
            </a>
            @role('admin')
            <div class="form-group row" style="margin-top: .3rem; ">
                <form action="{{ route('categories.create') }}" method="POST" class="w-100">
                    <div class="col-12 input-group" style="">
                        @csrf
                        <input type="text" class="form-control" name="name"
                            style="border-top-left-radius: 9999px; border-bottom-left-radius: 9999px; padding: 25px 16px"
                            placeholder="Add new category">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"
                                style="border-top-right-radius: 9999px; border-bottom-right-radius: 9999px">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            @endrole
        </div>
    </div>
</div>
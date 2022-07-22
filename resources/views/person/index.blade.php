<x-app-nav>
    <index-person :children="{{ $children }}" :cities="{{$cities}}" :people="{{$people}}"></index-person>
    <index-child :children="{{ $children }}" :people="{{$people}}"></index-child>
</x-app-nav>

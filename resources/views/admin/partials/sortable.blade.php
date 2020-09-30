@section('scripts')
    @parent
    <script type="text/javascript" charset="utf-8">

        // init sort as global variable (important)
        var sort;
        function initSortableMenu(path, uniqueId)
        {

            $('#sortable-menu').click(function (e)
            {
                var target = $(e.target), action = target.data('action');

                if (action === 'expand-all') {
                    $('.collapse').collapse('show');
                }

                if (action === 'collapse-all') {
                    $('.collapse').collapse('hide');
                }
            });


            function serialize(sortable){

                var serialized = [];

                if(sortable !== null){
                    var children = [].slice.call(sortable.children);

                    for (var i in children) {
                        var nested = children[i].querySelector('.dd-list');
                        serialized.push({
                            id: children[i].dataset['id'],
                            children: nested ? serialize(nested) : []
                        });
                    }
                }

                return serialized
            };


            var sortableOptions = {
                group: {
                    name: "dd-list",
                    pull: true,
                    put: true,
                },
                handle: '.dd-handle',
                swapThreshold: 0.7,
                emptyInsertThreshold: 10,
                dataIdAttr: 'data-id',
                animation: 150,
                forceFallback: true,
                fallbackOnBody: true,
                sort: true,
                // Element dragging ended
                onEnd: function (/**Event*/evt) {
                    // same properties as onEnd
                    var itemEl = evt.item;  // dragged HTMLElement
                    var items = document.getElementById(uniqueId);
                    var dataArray = serialize(items);

                    updateList(dataArray);
                }
            };

            var containers = null;
            var sortables = [];
            containers = document.querySelectorAll(".dd-list");
            for (var i = 0; i < containers.length; i++) {
                // use variable in order to use sort.destroy(); when needed e.g multiple sortables on same page
                sort = new Sortable(containers[i], sortableOptions);
            }

            function updateList(list)
            {
                var nestableString = window.JSON.stringify(list);

                $.post(path, {'list': nestableString}, function (data)
                {
                    if (data && data.result == 'success') {
                        notify('Successfully', 'The Order has been updated', null, null, 5000);
                    }
                    else {
                        notifyError();
                    }
                }, "json");
            }
        }
    </script>
@endsection
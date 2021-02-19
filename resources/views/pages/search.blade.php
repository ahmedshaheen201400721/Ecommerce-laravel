@extends('layouts.products')
{{--@include('components.nav')--}}
{{menu('header','components.nav')}}
@section('content1')
    <div class="p-4 bg-gray-200 text-gray-900 flex items-center">
      <div class="w-1/2">
          Home
          <svg class=" inline w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
          search
      </div>

{{--        <div class="w-1/2">--}}
{{--            @include('components.search')--}}
{{--        </div>--}}
    </div>
@endsection

@section('content2')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/reset-min.css" integrity="sha256-t2ATOGCtAIZNnzER679jwcFcKYfLlw01gli6F6oszk8=" crossorigin="anonymous">
    <style>
        .ais-Hits-item, .ais-InfiniteHits-item, .ais-InfiniteResults-item, .ais-Results-item{
            width: calc(33.33% - 1rem) !important;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7.3.1/themes/algolia-min.css" integrity="sha256-HB49n/BZjuqiCtQQf49OdZn63XuKFaxcIHWf0HNKte8=" crossorigin="anonymous">

    <div class="flex w-3/4 mx-auto divide-x-12 my-12">
        <div class="w-1/4">
            <div id="refinement-list"></div>

        </div>

        <div class="w-3/4 mx-auto ml-12">
            <header>
                <div id="search-box"></div>
                <div id="stats"></div>
            </header>

            <main>
                <div id="hits"></div>
                <div id="pagination" class=""></div>
            </main>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>
    <script>
        // Replace with your own values
        const searchClient = algoliasearch(
            '6VF1YVHEPP',
            'ae1bd5537ef26559bf9d08464ae3d694' // search only API key, not admin API key
        );


        const search = instantsearch({
            indexName: 'products',
            searchClient,
            routing: true,
        });


        search.addWidgets([
            instantsearch.widgets.configure({
                hitsPerPage: 20,
            })
        ]);

        search.addWidgets([
            instantsearch.widgets.searchBox({
                container: '#search-box',
                placeholder: 'Search for Products',
            }),
        ]);

        search.addWidgets([
            instantsearch.widgets.stats({
                container: '#stats',
            })
        ])
        // ================================================
        search.addWidgets([
            instantsearch.widgets.pagination({
                container: '#pagination',
            })
        ]);
        // ================================================
        search.addWidgets([
            instantsearch.widgets.hits({
                container: '#hits',
                templates: {
                    item: function(result){

                        console.log(result)
                        return `
                         <img src="http://ecommerce.test/${result.image}" class="w-30 h-40">
                        <div class="font-bolder">$${result.price/100}</div>

                        <div class="font-extrabold text-lg text-blue-900 ">${result.name}</div>
                        <div class="font-thin my-4 truncate">${result.details}</div>
                        <div>
                                <a href="" class="inline-block py-2 px-3 mt-4 rounded-full bg-blue-400 text-white capitalize font-bold hover:bg-blue-300"> buy your ${result.name} </a>
                            </div>
                      `
                    },
                    empty: `We didn't find any results for the search <em>"@{{query}}"</em>`,
                },
                cssClasses:{
                    item:'MyCustomHitsItem',
                }
            })
        ]);

    //     `
    //
    //                    <h2 class="font-bold">
    //     @{{#helpers.highlight}}{ "attribute": "name" }@{{/helpers.highlight}}
    //                 </h2>
    //                 <p>@{{ price }}</p>
    // `,
        // =============================================================
        search.addWidgets([
            instantsearch.widgets.refinementList({
                container: '#refinement-list',
                attribute: 'categories',
            })
        ]);



        //
        // const refinementListWithPanel = instantsearch.widgets.panel({
        //     templates: {
        //         header: 'categories (@{{ results.nbHits }} results)',
        //     },
        // })(instantsearch.widgets.refinementList);
        //
        //
        // search.addWidgets([
        //     refinementListWithPanel({
        //         container: '#refinement-list',
        //         attribute: 'categories',
        //     }),
        // ]);

        // ===================================================================
        search.start();

    </script>


@endsection


{{--<script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>--}}
{{--<script>--}}

{{--    // Replace with your own values--}}
{{--    const searchClient = algoliasearch(--}}
{{--        '6VF1YVHEPP',--}}
{{--        'ae1bd5537ef26559bf9d08464ae3d694' // search only API key, not admin API key--}}
{{--    );--}}


{{--    const search = instantsearch({--}}
{{--        indexName: 'products',--}}
{{--        searchClient,--}}
{{--        routing: true,--}}
{{--    });--}}

{{--    search.addWidgets([--}}
{{--        instantsearch.widgets.configure({--}}
{{--            hitsPerPage: 10,--}}
{{--        })--}}
{{--    ]);--}}

{{--    search.addWidgets([--}}
{{--        instantsearch.widgets.searchBox({--}}
{{--            container: '#search-box',--}}
{{--            placeholder: 'Search for contacts',--}}
{{--        })--}}
{{--    ]);--}}

{{--    search.addWidgets([--}}
{{--        instantsearch.widgets.hits({--}}
{{--            container: '#hits',--}}
{{--            templates: {--}}
{{--                item: document.getElementById('hit-template').innerHTML,--}}
{{--                --}}{{--empty: `We didn't find any results for the search <em>"{{query}}"</em>`,--}}
{{--            },--}}
{{--        })--}}
{{--    ]);--}}

{{--    search.start();--}}

{{--</script>--}}
{{--</body>--}}
{{--</html>--}}

<style>
    .aa-input-container {
        display: inline-block;
        position: relative;
    }
    .aa-input-search {
        width: 300px;
        padding: 12px 28px 12px 12px;
        border: 1px solid #e4e4e4;
        box-sizing: border-box;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
    }
    .aa-input-search::-webkit-search-decoration, .aa-input-search::-webkit-search-cancel-button,
    .aa-input-search::-webkit-search-results-button, .aa-input-search::-webkit-search-results-decoration {
        display: none;
    }
    em{
        background-color: #eeeeee;
        font-weight: bolder;
    }
    .aa-input-icon {
        height: 16px;
        width: 16px;
        position: absolute;
        top: 50%;
        right: 16px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        fill: #e4e4e4;
        pointer-events: none;
    }
    .aa-dropdown-menu {
        background-color: #fff;
        border: 1px solid rgba(228, 228, 228, 0.6);
        min-width: 300px;
        margin-top: 10px;
        box-sizing: border-box;
    }
    .aa-suggestion {
        padding: 6px 12px;
        cursor: pointer;
    }
    .aa-suggestion + .aa-suggestion {
        border-top: 1px solid rgba(228, 228, 228, 0.6);
    }
    .aa-suggestion:hover , .aa-suggestion.aa-cursor {
        background-color:  rgba(241, 241, 241, 0.6);
    }
    .aa-suggestions-category {
        border-bottom: 1px solid rgba(228, 228, 228, 0.6);
        border-top: 1px solid rgba(228, 228, 228, 0.6);
        padding: 6px 12px;
    }
</style>
<div class="aa-input-container" id="aa-input-container">
    <input type="search" id="aa-search-input" class="aa-input-search rounded-full "
           placeholder="Search for Products..." name="search" autocomplete="off" />

    <svg class="aa-input-icon " viewBox="654 -372 1664 1664">
        <path d="M1806,332c0-123.3-43.8-228.8-131.5-316.5C1586.8-72.2,1481.3-116,1358-116s-228.8,43.8-316.5,131.5  C953.8,103.2,910,208.7,910,332s43.8,228.8,131.5,316.5C1129.2,736.2,1234.7,780,1358,780s228.8-43.8,316.5-131.5  C1762.2,560.8,1806,455.3,1806,332z M2318,1164c0,34.7-12.7,64.7-38,90s-55.3,38-90,38c-36,0-66-12.7-90-38l-343-342  c-119.3,82.7-252.3,124-399,124c-95.3,0-186.5-18.5-273.5-55.5s-162-87-225-150s-113-138-150-225S654,427.3,654,332  s18.5-186.5,55.5-273.5s87-162,150-225s138-113,225-150S1262.7-372,1358-372s186.5,18.5,273.5,55.5s162,87,225,150s113,138,150,225  S2062,236.7,2062,332c0,146.7-41.3,279.7-124,399l343,343C2305.7,1098.7,2318,1128.7,2318,1164z" />
    </svg>
</div>

<script src="https://cdn.jsdelivr.net/npm/algoliasearch@3/dist/algoliasearchLite.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<script >
    const client = algoliasearch('6VF1YVHEPP', 'f74a239757b94a2d8352a10fa3eb0055');
    var pressEnter=false
    const index = client.initIndex('products');

    autocomplete(
        '#aa-search-input',
        {
            debug: false,
            templates: {
                dropdownMenu:
                    '<div class="aa-dataset-player"></div>'
            },
        },
        [
            {
                source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
                name: 'index',
                templates: {
                    // header: '<div class="aa-suggestions-category bg-gray-900 text-white">Products</div>',
                    suggestion: function(suggestion) {
                        return `<div class='flex justify-between'>
                                                    <span>${suggestion._highlightResult.name.value}</span>
                                                    <span>$${(suggestion.price/100).toFixed(2)}</span>
                                    </div>
                                      <div class='flex justify-between'>
                                                      <img src="http://ecommerce.test/${suggestion.image}" class="w-12 h-8">
                                                    <span>${suggestion.details}</span>
                                    </div>
`;
                    },
                    empty: '<div class="aa-empty">No matching products</div>',
                },
            },

        ]
    ).on('autocomplete:selected', function(event, suggestion, dataset, context) {
        document.location.href=document.location.origin+"/shop/"+suggestion.slug
        pressEnter=true;
    }).on('keyup',function (e) {
            if(e.keyCode==13 && !pressEnter){
                document.location.href=document.location.origin+"/search"
            }
    });
</script>

jQuery(document).ready(function () {

    const serviceSection = document.querySelector('.services-section-container');

    if (serviceSection) {
        const serviceTabs = serviceSection.querySelectorAll('.services-tabs-btn');
        const serviceContainers = serviceSection.querySelectorAll('.service-container');
        const pageAddress = window.location.href;
        const currentPage = `${window.location.origin}/our-services/#`;
        const address = pageAddress.replace(currentPage, '');

        if (address == "resource-center" || address == "community-program") {
            const activeBtn = serviceSection.querySelector(`button#${address}`);
            setTimeout(() => {
                activeBtn.click();
            }, 300)
        }

        serviceTabs.forEach(btn => btn.addEventListener('click', function (e) {
            e.preventDefault();
            const cat = btn.dataset.catBtn;
            const service = serviceSection.querySelector(`.service-container[data-category="${cat}"]`)
            serviceTabs.forEach(item => item.classList.remove('active'));
            btn.classList.add('active');
            serviceContainers.forEach(container => container.classList.remove('opened'));
            service.classList.add('opened');
        }))


        //photoswipe
        $('.other-imgs-cont').each(function () {
            $(this).masonry({
                itemSelector: '.other-imgs'
            });
            //initialize photoswipe
            const $pic = $(this)
            const getItems = function () {
                let items = [];
                $pic.find('a').each(function () {
                    let $href = $(this).attr('href');
                    let $size = $(this).data('size').split('x');
                    let $width = $size[0];
                    let $height = $size[1];

                    let item = {
                        src: $href,
                        w: $width,
                        h: $height
                    }
                    items.push(item);
                });
                return items;
            }

            const items = getItems();
            const $pswp = $('.pswp')[0];
            $pic.on('click', 'figure', function (event) {
                event.preventDefault();

                const $index = $(this).index();
                const options = {
                    index: $index,
                    bgOpacity: .9,
                    showHideOpacity: true
                }
                const lightBox = new PhotoSwipe($pswp, PhotoSwipeUI_Default, items, options);
                lightBox.init();
            });
        });
    }

});
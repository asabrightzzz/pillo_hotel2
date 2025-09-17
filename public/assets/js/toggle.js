document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.menu-toggle').forEach(function(toggle) {
        toggle.addEventListener('click', function (e) {
            e.preventDefault();

            let parent = this.closest('.menu-item');

            // Optional: close others for accordion effect
            document.querySelectorAll('.menu-item.open').forEach(function(item) {
                if (item !== parent) {
                    item.classList.remove('open');
                }
            });

            parent.classList.toggle('open');
        });
    });
});

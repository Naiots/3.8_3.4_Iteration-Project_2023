// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Show the loading screen immediately
    var loadingScreen = document.querySelector('.loading-screen');
    loadingScreen.style.opacity = '1';

    // Set a minimum loading time (in milliseconds)
    var minimumLoadingTime = 1000; // 1 second

    // Set a flag to track whether the minimum loading time has passed
    var minimumTimePassed = false;

    // Hide the loading screen with a smooth transition after the minimum loading time
    setTimeout(function () {
        minimumTimePassed = true;
        hideLoadingScreen();
    }, minimumLoadingTime);

    // Function to hide the loading screen
    function hideLoadingScreen() {
        if (minimumTimePassed) {
            loadingScreen.style.opacity = '0';

            // Show the content with a smooth transition
            var content = document.querySelector('.content');
            content.style.opacity = '1';

            // Add a delay before removing the loading screen
            setTimeout(function () {
                loadingScreen.style.display = 'none';
            }, 500); // Adjust the delay time as needed

            // Enable interaction with the page by removing the overlay
            loadingScreen.style.pointerEvents = 'none';
        }
    }

    // Call the function to hide the loading screen
    hideLoadingScreen();
});

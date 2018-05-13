  var tour = new Tour();

    // Add your steps. Not too many, you don't really want to get your users sleepy
    tour.addSteps([
      {
      element: "#news", // string (jQuery selector) - html element next to which the step popover should be shown
      title: "Title of my step", // string - title of the popover
      content: "Content of my step" // string - content of the popover
    },
  {
    element: "#news",
    title: "Title of my step",
    content: "Content of my step"
  }
 ]);

 // Initialize the tour
 tour.init();

 // Start the tour
 tour.start();
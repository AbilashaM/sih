function showPopup(ip, username, mac) {
  var popup = document.getElementById("popup");
  var ipElement = document.getElementById("ip");
  var usernameElement = document.getElementById("username");
  var macElement = document.getElementById("mac");

  // Populate the elements in the pop-up dialog with the provided details
  ipElement.textContent =  ip;
  usernameElement.textContent =  username;
  macElement.textContent =  mac;

  // Display the pop-up dialog
  popup.style.display = "block";
}

// Function to close the pop-up dialog
function closePopup() {
  var popup = document.getElementById("popup");

  // Hide the pop-up dialog
  popup.style.display = "none";
}

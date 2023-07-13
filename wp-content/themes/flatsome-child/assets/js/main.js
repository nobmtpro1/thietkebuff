function openPopupContact() {
  let popup = document.querySelector("#popup_contact");
  popup?.classList?.add("active");
}

function closePopupContact() {
  let popup = document.querySelector("#popup_contact");
  popup?.classList?.remove("active");
}

var buttonOpenPopupContact = document.querySelectorAll(".open_popup_contact");
buttonOpenPopupContact?.forEach((e) => {
  e?.addEventListener("click", openPopupContact);
});

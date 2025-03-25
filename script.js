document.querySelectorAll(".input-box input").forEach((input) => {
    input.addEventListener("input", (e) => {
        let text = e.target.value.split("").map((char, index) => {
            return `<span style="display: inline-block; transform: translateX(${index * 5}px); transition: 0.2s;">${char}</span>`;
        }).join("");
        e.target.nextElementSibling.innerHTML = text;
    });
});

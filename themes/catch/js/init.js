const main = document.getElementById("main");
const button = document.getElementById("button");

button.addEventListener("click", function(e) {
    button.textContent = "loading";
    const request = new XMLHttpRequest();
    request.open("GET", "home/getcustomers", true);
    request.onload = function() {
        if (request.status >= 200 && request.status < 400) {
            const table = buildTable(JSON.parse(request.responseText));
            main.insertAdjacentHTML("beforeend", table);
        } else {
            main.insertAdjacentHTML("beforeend", "<p>Loading Data Error</p>");
        }
        button.style.display = "none";
    };
    request.onerror = function() {
        main.insertAdjacentHTML("beforeend", "<p>Loading Data Error</p>");
        button.style.display = "none";
    };
    request.send();
});

function buildTable(data) {
    let template = `
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>IP Address</th>
                <th>Company</th>
                <th>City</th>
                <th>Title</th>
                <th>Website</th>
            </tr>
        </thead>
    <tbody>`;
    template = data.reduce(function(carry, customer) {
        carry += `            
        <tr>
            <td>${customer.id}</td>
            <td>${customer.first_name}</td>
            <td>${customer.last_name}</td>
            <td>${customer.email}</td>
            <td>${customer.gender}</td>
            <td>${customer.ip_address}</td>
            <td>${customer.company}</td>
            <td>${customer.city}</td>
            <td>${customer.title}</td>
        `;
        if (customer.website) {
            carry += `<td><a title="${customer.website}" href="${
                customer.website
            }">link</a></td>`;
        }
        carry += `</tr>`;
        return carry;
    }, template);
    template += `        
        </tbody>
    </table>`;
    return template;
}

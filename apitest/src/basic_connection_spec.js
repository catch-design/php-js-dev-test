describe('Check the customer json', function() {
    var frisby = require('frisby');
    var URL = 'http://' + process.env['CUSTOMERAPI_PORT_80_TCP_ADDR'] + ':'
        + process.env['CUSTOMERAPI_PORT_80_TCP_PORT'];

    frisby.create('GET Method')
        .get(URL + '/customers.php')
        .expectStatus(200)
        .expectHeaderContains('content-type', 'application/json')
        .expectJSONTypes('*', Array)
        .expectJSONLength(1000)
        .expectJSONTypes('0', {
            id: String,
            first_name: String,
            last_name: String,
            email: String,
            gender: String,
            ip_address: String,
            company: String,
            city: String,
            title: String,
            website: String
        })
        .expectJSON('0', {
            id: "1",
            first_name: "Laura",
            last_name: "Richards",
            email: "lrichards0@reverbnation.com",
            gender: "Female",
            ip_address: "81.192.7.99",
            company: "Meezzy",
            city: "Kallith\u00e9a",
            title: "Biostatistician III",
            website: "https:\/\/intel.com\/aliquam\/lacus\/morbi\/quis.png?ante=in&vivamus=sapien&tortor=iaculis&duis=congue&mattis=vivamus&egestas=metus&metus=arcu&aenean=adipiscing&fermentum=molestie&donec=hendrerit&ut=at&mauris=vulputate&eget=vitae&massa=nisl&tempor=aenean&convallis=lectus&nulla=pellentesque&neque=eget&libero=nunc&convallis=donec&eget=quis&eleifend=orci&luctus=eget&ultricies=orci&eu=vehicula&nibh=condimentum"
        })
        .toss();

    frisby.create('POST Method')
        .post(URL + '/customers.php', {})
        .expectStatus(400)
        .toss();
});

var WS = function() {

    var self = this;

    this.init = function() {

        var btcs = new WebSocket('wss://ws.blockchain.info/inv');

        btcs.onopen = function() {
            btcs.send( JSON.stringify( {"op":"unconfirmed_sub"} ) );
            btcs.send(JSON.stringify({"op": "blocks_sub"}));
        };

        btcs.onmessage = function(onmsg) {
            var response = JSON.parse(onmsg.data);
            if (response.op == "block") {
                self.appendBlockData(response.x);
            } else {
                self.appendTransactionData(response.x);
            }
        }
    };

    this.appendBlockData = function(block) {
        var index = block.blockIndex;
        $('#blocks').prepend("<tr>" + index + "</tr>");
    };

    this.appendTransactionData = function(transaction) {
        var amount = transaction.out[0].value;
        var hash = transaction.hash;
        var calAmount = amount / 100000000;
        var element = $('#transactions-body');

        var result = "<tr><td>" + hash.substring(0, 10) + "..</td><td>"+ calAmount +"</td></tr>";
        element.prepend(result);

    };


};
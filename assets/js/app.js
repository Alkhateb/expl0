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
                self.saveBlock(response.x);
            } else {
                self.appendTransactionData(response.x);
            }
        }
    };

    this.appendBlockData = function(block) {
        var index = block.blockIndex;
        var bhash = "<td><a href='/block/" + block.hash + "'>" + block.hash+"</a></td>";
        var size = "<td>" + block.size + "</td>";
        var height = "<td>" + block.height + "</td>";
        var txns = "<td>" + block.txIndexes.length + "</td>";
        var result = "<tr>" + bhash + height + size + txns + "</tr>"
        $('#blocks-body').prepend(result);
    };

    this.appendTransactionData = function(transaction) {
        var amount = transaction.out[0].value;
        var hash = transaction.hash;
        var calAmount = amount / 100000000;
        var element = $('#transactions-body');

        var result = "<tr><td><a href='/transaction/" + hash + "'>"  + hash + "</a></td><td>"+ calAmount +"</td></tr>";
        element.prepend(result);

    };

    this.saveBlock = function(block) {
        var data = {
            hash: block.hash,
            height: block.height,
            total: block.bits,
            size: block.size,
            transactions: block.txIndexes.length
        };

        $.ajax({
            url: "/block/save",
            method: "POST",
            data: data,
            dataType: "json"
        });
    }


};
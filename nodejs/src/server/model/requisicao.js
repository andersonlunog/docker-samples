const mongoose = require("mongoose");
const Schema = mongoose.Schema;

const requisicaoSchema = new Schema({
    moment: {
        type: Date,
        default: new Date()
    },
    data: Object
});

module.exports = mongoose.model("Requisicao", requisicaoSchema);
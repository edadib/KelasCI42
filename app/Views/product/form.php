<form action="/product/save" method="post">
    Nama : 
    <input type="text" name="name" id="name" />
    <br>

    Harga: 
    <input type="number" name="price" id="price" min="0" max="1000000" />
    <br>
    
    Keterangan: 
    <textarea name="desc" id="desc"></textarea>
    <br>
    
    <button type="submit">Hantar</button>
</form>
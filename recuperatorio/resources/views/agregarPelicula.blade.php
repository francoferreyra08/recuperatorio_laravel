<html>
    <head>
        <title>Agregar Pelicula</title>
    </head>
    <body>
      <div class="error">
        <ul>
          @foreach ($errors->All() as $error)
          <li>
          {{ $error }}

          </li>

          @endforeach
        </ul>

      </div>
        <form action="/agregarpeli" id="agregarPelicula" name="agregarPelicula" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div>
                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" id="titulo" value = "{{old('titulo')}}"/>
            </div>
            <div>
                <label for="rating">Rating</label>
                <input type="text" name="rating" id="rating" value = "{{old('rating')}}"/>
            </div>
            <div>
                <label for="premios">Premios</label>
                <input type="text" name="premios" id="premios"value = "{{old('premios')}}"/>
            </div>
            <div>
                <label for="duracion">Duracion</label>
                <input type="text" name="duracion" id="duracion" value = "{{old('duracion')}}"/>
            </div>
            <div>
                <label>Fecha de Estreno</label>
                <select name="dia">
                    <option value="">Dia</option>
                    <?php for ($i=1; $i < 32; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="mes">
                    <option value="">Mes</option>
                    <?php for ($i=1; $i < 13; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
                <select name="anio">
                    <option value="">Anio</option>
                    <?php for ($i=1900; $i < 2017; $i++) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="">
              <label for="Foto">Foto</label>
              <input type="file" name="foto">
            </div><br>
            <input type="submit" value="Agregar Pelicula" name="submit"/>
        </form>
    </body>
</html>

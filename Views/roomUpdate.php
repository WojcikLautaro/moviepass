<form method="POST" action=<?php echo FRONT_ROOT."Room/Update";?>>
        <div align="center">
            <h2>Update room:</h2>
            <div class="form-register"> 
				 <div class="form-register-ul">
                <input style="width:50%" type="text" name="name" value="<?php echo $room->getName() ?>" placeholder="Nombre" class="form-control" readonly="readonly">
                
                <input style="width:50%" type="number" name="capacity" value="<?php echo $room->getCapacity() ?>" placeholder="Capacidad" required class="form-control" min="10" max="300">
            <br>
                <input type="hidden" readonly name="roomId" value=<?php echo $room->getId() ?>>
                <input type="hidden" readonly name="cinemaId" value=<?php echo $room->getCinema()->getId() ?>>
                <button type="submit">Update</button>
        </div>
    </form>
</div>
</div>

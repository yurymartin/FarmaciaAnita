SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

DROP SCHEMA IF EXISTS `bdbotica` ;
CREATE SCHEMA IF NOT EXISTS `bdbotica` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `bdbotica` ;

-- -----------------------------------------------------
-- Table `bdbotica`.`personas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`personas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `dni` VARCHAR(45) NULL ,
  `nombres` VARCHAR(45) NULL ,
  `apellidos` VARCHAR(45) NULL ,
  `direccion` VARCHAR(45) NULL ,
  `genero` TINYINT(1) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`especialidades`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`especialidades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(450) NULL ,
  `descripcion` VARCHAR(450) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`empleados`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`empleados` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `foto` VARCHAR(45) NULL ,
  `sueldo` DECIMAL(9,2) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `persona_id` INT NOT NULL ,
  `especialidad_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_empleados_personas1_idx` (`persona_id` ASC) ,
  INDEX `fk_empleados_especialidades1_idx` (`especialidad_id` ASC) ,
  CONSTRAINT `fk_empleados_personas1`
    FOREIGN KEY (`persona_id` )
    REFERENCES `bdbotica`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_empleados_especialidades1`
    FOREIGN KEY (`especialidad_id` )
    REFERENCES `bdbotica`.`especialidades` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`tipousers`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`tipousers` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(100) NULL ,
  `desc` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`users`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  `email` VARCHAR(45) NULL ,
  `password` VARCHAR(100) NULL ,
  `remember_token` VARCHAR(100) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `tipouser_id` INT NOT NULL ,
  `empleado_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_users_tipousers1_idx` (`tipouser_id` ASC) ,
  INDEX `fk_users_empleados1_idx` (`empleado_id` ASC) ,
  CONSTRAINT `fk_users_tipousers1`
    FOREIGN KEY (`tipouser_id` )
    REFERENCES `bdbotica`.`tipousers` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_empleados1`
    FOREIGN KEY (`empleado_id` )
    REFERENCES `bdbotica`.`empleados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`tipo_productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`tipo_productos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nom` VARCHAR(100) NULL ,
  `desc` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`ubicaciones`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`ubicaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ubicacion` VARCHAR(450) NULL ,
  `descripcion` VARCHAR(450) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`productos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`productos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `codigo` VARCHAR(45) NULL ,
  `nom` VARCHAR(45) NULL ,
  `desc` TEXT NULL ,
  `nom_generico` VARCHAR(100) NULL ,
  `imagen` VARCHAR(200) NULL ,
  `stock` INT(11) NULL ,
  `fec_cad` DATE NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `tipo_id` INT NOT NULL ,
  `ubicacion_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_productos_tipos1_idx` (`tipo_id` ASC) ,
  INDEX `fk_productos_ubicacion1_idx` (`ubicacion_id` ASC) ,
  CONSTRAINT `fk_productos_tipos1`
    FOREIGN KEY (`tipo_id` )
    REFERENCES `bdbotica`.`tipo_productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_ubicacion1`
    FOREIGN KEY (`ubicacion_id` )
    REFERENCES `bdbotica`.`ubicaciones` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`sintomas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`sintomas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(450) NULL ,
  `desc` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`proveedores`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`proveedores` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ruc` VARCHAR(45) NULL ,
  `nombre` VARCHAR(500) NULL ,
  `telefono` VARCHAR(45) NULL ,
  `email` VARCHAR(450) NULL ,
  `direccion` VARCHAR(450) NULL ,
  `descripcion` TEXT NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`pagos`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`pagos` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL ,
  `desc` VARCHAR(200) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`tipo_comprobantes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`tipo_comprobantes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tipo` VARCHAR(45) NULL ,
  `desc` VARCHAR(200) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`clientes`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`clientes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `persona_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_clientes_personas1_idx` (`persona_id` ASC) ,
  CONSTRAINT `fk_clientes_personas1`
    FOREIGN KEY (`persona_id` )
    REFERENCES `bdbotica`.`personas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`estado_ventas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`estado_ventas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(450) NULL ,
  `desc` VARCHAR(450) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`ventas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`ventas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `serie_comprobante` VARCHAR(45) NULL ,
  `num_comprobante` VARCHAR(45) NULL ,
  `total_venta` DECIMAL(9,2) NULL ,
  `igv` DECIMAL(3,2) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `pago_id` INT NOT NULL ,
  `tipo_comprobante_id` INT NOT NULL ,
  `cliente_id` INT NOT NULL ,
  `empleado_id` INT NOT NULL ,
  `estado_venta_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ventas_pagos1_idx` (`pago_id` ASC) ,
  INDEX `fk_ventas_comprobantes1_idx` (`tipo_comprobante_id` ASC) ,
  INDEX `fk_ventas_clientes1_idx` (`cliente_id` ASC) ,
  INDEX `fk_ventas_empleados1_idx` (`empleado_id` ASC) ,
  INDEX `fk_ventas_estado_ventas1_idx` (`estado_venta_id` ASC) ,
  CONSTRAINT `fk_ventas_pagos1`
    FOREIGN KEY (`pago_id` )
    REFERENCES `bdbotica`.`pagos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_comprobantes1`
    FOREIGN KEY (`tipo_comprobante_id` )
    REFERENCES `bdbotica`.`tipo_comprobantes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_clientes1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `bdbotica`.`clientes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_empleados1`
    FOREIGN KEY (`empleado_id` )
    REFERENCES `bdbotica`.`empleados` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_estado_ventas1`
    FOREIGN KEY (`estado_venta_id` )
    REFERENCES `bdbotica`.`estado_ventas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`detalle_ventas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`detalle_ventas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` INT NULL ,
  `precio_venta` DECIMAL(9,2) NULL ,
  `descuento` DECIMAL(9,2) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `venta_id` INT NOT NULL ,
  `producto_id` INT NOT NULL ,
  INDEX `fk_ventas_has_productos_productos1_idx` (`producto_id` ASC) ,
  INDEX `fk_ventas_has_productos_ventas1_idx` (`venta_id` ASC) ,
  PRIMARY KEY (`id`) ,
  CONSTRAINT `fk_ventas_has_productos_ventas1`
    FOREIGN KEY (`venta_id` )
    REFERENCES `bdbotica`.`ventas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_has_productos_productos1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `bdbotica`.`productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`estado_compras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`estado_compras` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `estado` VARCHAR(450) NULL ,
  `descripcion` VARCHAR(450) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`compras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`compras` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `monto_total` DECIMAL(9,2) NULL ,
  `igv` DECIMAL(9,2) NULL ,
  `serie_comprobante` VARCHAR(45) NULL ,
  `num_comprobante` VARCHAR(45) NULL ,
  `activo` TINYINT NULL ,
  `borrado` TINYINT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `proveedor_id` INT NOT NULL ,
  `estado_compra_id` INT NOT NULL ,
  `tipo_comprobante_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_compra_proveedores1_idx` (`proveedor_id` ASC) ,
  INDEX `fk_compra_estado1_idx` (`estado_compra_id` ASC) ,
  INDEX `fk_compras_tipo_comprobantes1_idx` (`tipo_comprobante_id` ASC) ,
  CONSTRAINT `fk_compra_proveedores1`
    FOREIGN KEY (`proveedor_id` )
    REFERENCES `bdbotica`.`proveedores` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_estado1`
    FOREIGN KEY (`estado_compra_id` )
    REFERENCES `bdbotica`.`estado_compras` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_tipo_comprobantes1`
    FOREIGN KEY (`tipo_comprobante_id` )
    REFERENCES `bdbotica`.`tipo_comprobantes` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`detalle_compras`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`detalle_compras` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `cantidad` INT NULL ,
  `precio_compra` DECIMAL(11,2) NULL ,
  `precio_venta` DECIMAL(11,2) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `compra_id` INT NOT NULL ,
  `producto_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_producto_compras_compra1_idx` (`compra_id` ASC) ,
  INDEX `fk_producto_compras_productos1_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_producto_compras_compra1`
    FOREIGN KEY (`compra_id` )
    REFERENCES `bdbotica`.`compras` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_compras_productos1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `bdbotica`.`productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bdbotica`.`productos_sintomas`
-- -----------------------------------------------------
CREATE  TABLE IF NOT EXISTS `bdbotica`.`productos_sintomas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `intensidad` INT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `producto_id` INT NOT NULL ,
  `sintoma_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_productos_has_sintomas_sintomas1_idx` (`sintoma_id` ASC) ,
  INDEX `fk_productos_has_sintomas_productos1_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_productos_has_sintomas_productos1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `bdbotica`.`productos` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_productos_has_sintomas_sintomas1`
    FOREIGN KEY (`sintoma_id` )
    REFERENCES `bdbotica`.`sintomas` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `bdbotica` ;

DELIMITER //
CREATE TRIGGER tr_updStockIngreso AFTER INSERT ON detalle_ventas
FOR EACH ROW BEGIN
	UPDATE productos SET stock = stock + NEW.cantidad
    WHERE productos.id = NEW.producto_id;
END
//
DELIMITER ;


DELIMITER //
CREATE TRIGGER tr_updStockVenta AFTER INSERT ON detalle_ventas
 FOR EACH ROW BEGIN
 UPDATE productos SET stock = stock - NEW.cantidad 
 WHERE productos.id = NEW.producto_id;
END
//
DELIMITER ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

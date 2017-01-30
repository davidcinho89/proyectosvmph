--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: barrios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE barrios (
    idbarrio integer NOT NULL,
    idlocalidad integer,
    nombre character varying(255),
    tarifa integer,
    nombrezona character varying(255)
);


ALTER TABLE public.barrios OWNER TO postgres;

--
-- Name: beneficiarios_idbeneficiario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE beneficiarios_idbeneficiario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.beneficiarios_idbeneficiario_seq OWNER TO postgres;

--
-- Name: beneficiarios_idbeneficiario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('beneficiarios_idbeneficiario_seq', 66, true);


--
-- Name: beneficiarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE beneficiarios (
    idbeneficiario integer DEFAULT nextval('beneficiarios_idbeneficiario_seq'::regclass) NOT NULL,
    ciudad integer NOT NULL,
    nombreusuario character varying(255) NOT NULL,
    cedula bigint,
    direccion character varying(255) NOT NULL,
    telefonocasa bigint,
    email character varying(255) NOT NULL,
    id_usuario integer,
    fechacumple date,
    parentesco character varying(255)
);


ALTER TABLE public.beneficiarios OWNER TO postgres;

--
-- Name: bodegas_idbodega_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bodegas_idbodega_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 50000
    CACHE 1;


ALTER TABLE public.bodegas_idbodega_seq OWNER TO postgres;

--
-- Name: bodegas_idbodega_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bodegas_idbodega_seq', 27, true);


--
-- Name: bodegas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bodegas (
    bodegaid integer DEFAULT nextval('bodegas_idbodega_seq'::regclass) NOT NULL,
    nombrebodega character varying(255) NOT NULL,
    direccionbodega character varying(255) NOT NULL,
    idtercero integer,
    contactobodega text,
    emailbodega text,
    telefonobodega numeric,
    codigobodega numeric
);


ALTER TABLE public.bodegas OWNER TO postgres;

--
-- Name: bodegasproductos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE bodegasproductos (
    idbodegaproductos integer NOT NULL,
    idbodega integer,
    idproducto integer,
    stock double precision,
    stockmaximo double precision,
    stockminimo double precision,
    costo double precision,
    preciobase double precision
);


ALTER TABLE public.bodegasproductos OWNER TO postgres;

--
-- Name: bodegasproductos_idbodegaproductos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE bodegasproductos_idbodegaproductos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.bodegasproductos_idbodegaproductos_seq OWNER TO postgres;

--
-- Name: bodegasproductos_idbodegaproductos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE bodegasproductos_idbodegaproductos_seq OWNED BY bodegasproductos.idbodegaproductos;


--
-- Name: bodegasproductos_idbodegaproductos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('bodegasproductos_idbodegaproductos_seq', 36497, true);


--
-- Name: categoriasp_idcategoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE categoriasp_idcategoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categoriasp_idcategoria_seq OWNER TO postgres;

--
-- Name: categoriasp_idcategoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('categoriasp_idcategoria_seq', 45, true);


--
-- Name: categoriasp; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE categoriasp (
    idcategoria integer DEFAULT nextval('categoriasp_idcategoria_seq'::regclass) NOT NULL,
    nombrecategoria character varying(255) NOT NULL
);


ALTER TABLE public.categoriasp OWNER TO postgres;

--
-- Name: ciudades_id_ciudad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ciudades_id_ciudad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ciudades_id_ciudad_seq OWNER TO postgres;

--
-- Name: ciudades_id_ciudad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ciudades_id_ciudad_seq', 1, false);


--
-- Name: ciudades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ciudades (
    idciudad integer DEFAULT nextval('ciudades_id_ciudad_seq'::regclass) NOT NULL,
    iddepartamento integer NOT NULL,
    nombreciudad character varying(255) NOT NULL,
    codigodane integer NOT NULL
);


ALTER TABLE public.ciudades OWNER TO postgres;

--
-- Name: comisiones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE comisiones (
    idcomision integer NOT NULL,
    idperiodo integer NOT NULL,
    idusuario integer,
    valortotal integer,
    nousers integer,
    fechacomision timestamp without time zone
);


ALTER TABLE public.comisiones OWNER TO postgres;

--
-- Name: comisiones_idcomision_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE comisiones_idcomision_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comisiones_idcomision_seq OWNER TO postgres;

--
-- Name: comisiones_idcomision_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE comisiones_idcomision_seq OWNED BY comisiones.idcomision;


--
-- Name: comisiones_idcomision_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('comisiones_idcomision_seq', 5997, true);


--
-- Name: departamentos_iddepartamento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE departamentos_iddepartamento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.departamentos_iddepartamento_seq OWNER TO postgres;

--
-- Name: departamentos_iddepartamento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('departamentos_iddepartamento_seq', 1, false);


--
-- Name: departamentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE departamentos (
    iddepartamento integer DEFAULT nextval('departamentos_iddepartamento_seq'::regclass) NOT NULL,
    nombredepartamento character varying(255) NOT NULL,
    codigodane integer NOT NULL
);


ALTER TABLE public.departamentos OWNER TO postgres;

--
-- Name: detallecomisiones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE detallecomisiones (
    iddetallecomision integer NOT NULL,
    nivel integer,
    idfrontal integer,
    valordetalle integer,
    idcomision integer NOT NULL
);


ALTER TABLE public.detallecomisiones OWNER TO postgres;

--
-- Name: detallecomisiones_iddetallecomision_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detallecomisiones_iddetallecomision_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detallecomisiones_iddetallecomision_seq OWNER TO postgres;

--
-- Name: detallecomisiones_iddetallecomision_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE detallecomisiones_iddetallecomision_seq OWNED BY detallecomisiones.iddetallecomision;


--
-- Name: detallecomisiones_iddetallecomision_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detallecomisiones_iddetallecomision_seq', 14, true);


--
-- Name: detalledocumentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE detalledocumentos (
    iddetallecodumentos integer NOT NULL,
    cantidad double precision,
    costo double precision,
    idproducto integer,
    iddocumento integer
);


ALTER TABLE public.detalledocumentos OWNER TO postgres;

--
-- Name: detalledocumentos_iddetallecodumentos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalledocumentos_iddetallecodumentos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalledocumentos_iddetallecodumentos_seq OWNER TO postgres;

--
-- Name: detalledocumentos_iddetallecodumentos_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE detalledocumentos_iddetallecodumentos_seq OWNED BY detalledocumentos.iddetallecodumentos;


--
-- Name: detalledocumentos_iddetallecodumentos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalledocumentos_iddetallecodumentos_seq', 37, true);


--
-- Name: detalleventas_iddetalleventa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE detalleventas_iddetalleventa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.detalleventas_iddetalleventa_seq OWNER TO postgres;

--
-- Name: detalleventas_iddetalleventa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('detalleventas_iddetalleventa_seq', 15, true);


--
-- Name: detalleventas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE detalleventas (
    iddetalleventa integer DEFAULT nextval('detalleventas_iddetalleventa_seq'::regclass) NOT NULL,
    idproducto integer NOT NULL,
    idventa integer NOT NULL,
    cantidad double precision NOT NULL,
    precioventa double precision,
    nivel0 double precision,
    nivel1 double precision,
    nivel2 double precision,
    nivel3 double precision,
    niveli double precision,
    valorpuntodetalle double precision,
    costoalfacturar double precision,
    cantidaddevuelta double precision
);


ALTER TABLE public.detalleventas OWNER TO postgres;

--
-- Name: documentos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE documentos (
    iddocumento integer NOT NULL,
    prefijo character(6),
    fecha timestamp without time zone,
    observacion text,
    tipodocumento text,
    codigo bigint,
    idtercero integer,
    idbodega integer,
    nombredocumento character(40),
    codigodocumento bigint,
    idfactura integer,
    idperiodo integer
);


ALTER TABLE public.documentos OWNER TO postgres;

--
-- Name: documentos_iddocumento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE documentos_iddocumento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.documentos_iddocumento_seq OWNER TO postgres;

--
-- Name: documentos_iddocumento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE documentos_iddocumento_seq OWNED BY documentos.iddocumento;


--
-- Name: documentos_iddocumento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('documentos_iddocumento_seq', 17, true);


--
-- Name: empresa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE empresa (
    idempresa integer NOT NULL,
    nombreempresa text,
    nitempresa numeric,
    emailempresa text,
    direccionempresa text,
    ciudadempresa integer,
    contactoempresa text,
    logoempresa text,
    sloganempresa text,
    regimenempresa text,
    actividadempresa text,
    dominnioempresa text,
    telefono integer
);


ALTER TABLE public.empresa OWNER TO postgres;

--
-- Name: estados_idestado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE estados_idestado_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.estados_idestado_seq OWNER TO postgres;

--
-- Name: estados_idestado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('estados_idestado_seq', 1, false);


--
-- Name: estados; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE estados (
    idestado integer DEFAULT nextval('estados_idestado_seq'::regclass) NOT NULL,
    nombreestado character varying(255)
);


ALTER TABLE public.estados OWNER TO postgres;

--
-- Name: facturaventas_idfactura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE facturaventas_idfactura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facturaventas_idfactura_seq OWNER TO postgres;

--
-- Name: facturaventas_idfactura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('facturaventas_idfactura_seq', 5, true);


--
-- Name: facturaventas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE facturaventas (
    idfactura integer DEFAULT nextval('facturaventas_idfactura_seq'::regclass) NOT NULL,
    idventa integer,
    consecutivo integer,
    seguimiento character varying(255),
    fecha date,
    idperiodo integer,
    idbodega integer
);


ALTER TABLE public.facturaventas OWNER TO postgres;

--
-- Name: imagenes_idimagen_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE imagenes_idimagen_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.imagenes_idimagen_seq OWNER TO postgres;

--
-- Name: imagenes_idimagen_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('imagenes_idimagen_seq', 3392, true);


--
-- Name: imagenes; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE imagenes (
    idimagen integer DEFAULT nextval('imagenes_idimagen_seq'::regclass) NOT NULL,
    nombreimagen character varying(255) NOT NULL,
    url character varying(255) NOT NULL
);


ALTER TABLE public.imagenes OWNER TO postgres;

--
-- Name: localidades; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE localidades (
    idlocalidad integer NOT NULL,
    nombre character varying(255),
    tarifa integer
);


ALTER TABLE public.localidades OWNER TO postgres;

--
-- Name: localidades_idlocalidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE localidades_idlocalidad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.localidades_idlocalidad_seq OWNER TO postgres;

--
-- Name: localidades_idlocalidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('localidades_idlocalidad_seq', 1, false);


--
-- Name: menus_idmenu_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE menus_idmenu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.menus_idmenu_seq OWNER TO postgres;

--
-- Name: menus_idmenu_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('menus_idmenu_seq', 1, false);


--
-- Name: menus; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE menus (
    idmenu integer DEFAULT nextval('menus_idmenu_seq'::regclass) NOT NULL,
    nombremenu character varying(255) NOT NULL,
    url_main text
);


ALTER TABLE public.menus OWNER TO postgres;

--
-- Name: modulos_idmodulo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE modulos_idmodulo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.modulos_idmodulo_seq OWNER TO postgres;

--
-- Name: modulos_idmodulo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('modulos_idmodulo_seq', 1, false);


--
-- Name: movimientos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE movimientos (
    idmovimiento integer NOT NULL,
    idbodegasproductos integer,
    fecha date,
    tipomovimiento character varying(255),
    idfacturaventa integer,
    idocumento integer,
    idbodega integer,
    saldostock double precision,
    costo double precision
);


ALTER TABLE public.movimientos OWNER TO postgres;

--
-- Name: movimientos_idmovimiento_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE movimientos_idmovimiento_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.movimientos_idmovimiento_seq OWNER TO postgres;

--
-- Name: movimientos_idmovimiento_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE movimientos_idmovimiento_seq OWNED BY movimientos.idmovimiento;


--
-- Name: movimientos_idmovimiento_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('movimientos_idmovimiento_seq', 49, true);


--
-- Name: perfiles_id_perfil_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfiles_id_perfil_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfiles_id_perfil_seq OWNER TO postgres;

--
-- Name: perfiles_id_perfil_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('perfiles_id_perfil_seq', 21, true);


--
-- Name: perfiles; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfiles (
    idperfil integer DEFAULT nextval('perfiles_id_perfil_seq'::regclass) NOT NULL,
    nombreperfil character varying(250) NOT NULL,
    grupo text
);


ALTER TABLE public.perfiles OWNER TO postgres;

--
-- Name: perfiles_permisos_id_idperfilespermisos_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE perfiles_permisos_id_idperfilespermisos_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.perfiles_permisos_id_idperfilespermisos_seq OWNER TO postgres;

--
-- Name: perfiles_permisos_id_idperfilespermisos_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('perfiles_permisos_id_idperfilespermisos_seq', 146, true);


--
-- Name: perfiles_permisos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE perfiles_permisos (
    idperfilespermisos integer DEFAULT nextval('perfiles_permisos_id_idperfilespermisos_seq'::regclass) NOT NULL,
    idperfil integer NOT NULL,
    idsubmenu integer NOT NULL
);


ALTER TABLE public.perfiles_permisos OWNER TO postgres;

--
-- Name: periodos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE periodos (
    idperiodo integer NOT NULL,
    fechainicio date,
    fechafin date,
    nombreperiodo character varying(255)
);


ALTER TABLE public.periodos OWNER TO postgres;

--
-- Name: periodos_idperiodo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE periodos_idperiodo_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.periodos_idperiodo_seq OWNER TO postgres;

--
-- Name: periodos_idperiodo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE periodos_idperiodo_seq OWNED BY periodos.idperiodo;


--
-- Name: periodos_idperiodo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('periodos_idperiodo_seq', 20, true);


--
-- Name: periodosventa; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE periodosventa (
    idperiodosventa integer NOT NULL,
    anio numeric
);


ALTER TABLE public.periodosventa OWNER TO postgres;

--
-- Name: periodosventa_idperiodosventa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE periodosventa_idperiodosventa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.periodosventa_idperiodosventa_seq OWNER TO postgres;

--
-- Name: periodosventa_idperiodosventa_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE periodosventa_idperiodosventa_seq OWNED BY periodosventa.idperiodosventa;


--
-- Name: periodosventa_idperiodosventa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('periodosventa_idperiodosventa_seq', 2, true);


--
-- Name: productos_idproducto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE productos_idproducto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_idproducto_seq OWNER TO postgres;

--
-- Name: productos_idproducto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('productos_idproducto_seq', 3109, true);


--
-- Name: productos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE productos (
    idproducto integer DEFAULT nextval('productos_idproducto_seq'::regclass) NOT NULL,
    idcategoria integer NOT NULL,
    nombreproducto character varying(255) NOT NULL,
    puntos double precision NOT NULL,
    idimagen bigint,
    iva integer,
    estado character varying(50),
    precio double precision,
    precioiva double precision,
    utilidadtotal double precision,
    utilidadplentiful double precision,
    nivel0 double precision,
    nivel1 double precision,
    nivel2 double precision,
    nivel3 double precision,
    niveli double precision,
    porcentajeutilidad integer,
    unidadmedida text,
    gramospresentacion numeric,
    relacioncajasproductos numeric,
    referencia numeric
);


ALTER TABLE public.productos OWNER TO postgres;

--
-- Name: productos_nivel1_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE productos_nivel1_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_nivel1_seq OWNER TO postgres;

--
-- Name: productos_nivel1_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE productos_nivel1_seq OWNED BY productos.nivel1;


--
-- Name: productos_nivel1_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('productos_nivel1_seq', 1554, true);


--
-- Name: productos_porcentajeutilidad_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE productos_porcentajeutilidad_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productos_porcentajeutilidad_seq OWNER TO postgres;

--
-- Name: productos_porcentajeutilidad_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE productos_porcentajeutilidad_seq OWNED BY productos.porcentajeutilidad;


--
-- Name: productos_porcentajeutilidad_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('productos_porcentajeutilidad_seq', 1554, true);


--
-- Name: productosproveedores; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE productosproveedores (
    idproductosproveedores integer NOT NULL,
    idproducto integer,
    idproveedor integer,
    ultimocosto double precision
);


ALTER TABLE public.productosproveedores OWNER TO postgres;

--
-- Name: productosproveedores_idproductosproveedores_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE productosproveedores_idproductosproveedores_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.productosproveedores_idproductosproveedores_seq OWNER TO postgres;

--
-- Name: productosproveedores_idproductosproveedores_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE productosproveedores_idproductosproveedores_seq OWNED BY productosproveedores.idproductosproveedores;


--
-- Name: productosproveedores_idproductosproveedores_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('productosproveedores_idproductosproveedores_seq', 18, true);


--
-- Name: remisiones; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE remisiones (
    idremision integer NOT NULL,
    idbodega integer,
    iddocumento integer,
    estado text,
    emisor integer,
    receptor integer
);


ALTER TABLE public.remisiones OWNER TO postgres;

--
-- Name: remisiones_idremision_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE remisiones_idremision_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.remisiones_idremision_seq OWNER TO postgres;

--
-- Name: remisiones_idremision_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE remisiones_idremision_seq OWNED BY remisiones.idremision;


--
-- Name: remisiones_idremision_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('remisiones_idremision_seq', 1, true);


--
-- Name: resolucionfacturas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE resolucionfacturas (
    idresolucionfactura integer NOT NULL,
    idbodega integer,
    minvalue bigint,
    maxvalue bigint,
    prefijo text,
    descripcion text
);


ALTER TABLE public.resolucionfacturas OWNER TO postgres;

--
-- Name: resolucionfacturas_idresolucionfactura_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE resolucionfacturas_idresolucionfactura_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.resolucionfacturas_idresolucionfactura_seq OWNER TO postgres;

--
-- Name: resolucionfacturas_idresolucionfactura_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE resolucionfacturas_idresolucionfactura_seq OWNED BY resolucionfacturas.idresolucionfactura;


--
-- Name: resolucionfacturas_idresolucionfactura_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('resolucionfacturas_idresolucionfactura_seq', 1, false);


--
-- Name: saldoinventario; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE saldoinventario (
    idsaldoinventario integer NOT NULL,
    idproducto integer NOT NULL,
    idbodega integer NOT NULL,
    cantidad double precision,
    precio double precision,
    fechasaldo date,
    fechacarga timestamp without time zone,
    urlarchivo text
);


ALTER TABLE public.saldoinventario OWNER TO postgres;

--
-- Name: saldoinventario_idsaldoinventario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE saldoinventario_idsaldoinventario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.saldoinventario_idsaldoinventario_seq OWNER TO postgres;

--
-- Name: saldoinventario_idsaldoinventario_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE saldoinventario_idsaldoinventario_seq OWNED BY saldoinventario.idsaldoinventario;


--
-- Name: saldoinventario_idsaldoinventario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('saldoinventario_idsaldoinventario_seq', 20, true);


--
-- Name: subcategorias_idsubcategoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE subcategorias_idsubcategoria_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.subcategorias_idsubcategoria_seq OWNER TO postgres;

--
-- Name: subcategorias_idsubcategoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('subcategorias_idsubcategoria_seq', 1, false);


--
-- Name: submenus_idsubmenu_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE submenus_idsubmenu_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.submenus_idsubmenu_seq OWNER TO postgres;

--
-- Name: submenus_idsubmenu_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('submenus_idsubmenu_seq', 37, true);


--
-- Name: submenus; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE submenus (
    idsubmenu integer DEFAULT nextval('submenus_idsubmenu_seq'::regclass) NOT NULL,
    idmenu integer NOT NULL,
    nombresubmenu character varying(255) NOT NULL,
    url_submenu text,
    icon_submenu text
);


ALTER TABLE public.submenus OWNER TO postgres;

--
-- Name: terceros; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE terceros (
    idtercero integer NOT NULL,
    nombretercero character varying(255),
    direccion character varying(255),
    telefono bigint,
    nit bigint,
    ciudad integer,
    celulartercero bigint,
    contactotercero text,
    emailtercero text,
    telefono2 numeric,
    fechaingreso date,
    codigotercero numeric
);


ALTER TABLE public.terceros OWNER TO postgres;

--
-- Name: terceros_idtercero_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE terceros_idtercero_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.terceros_idtercero_seq OWNER TO postgres;

--
-- Name: terceros_idtercero_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE terceros_idtercero_seq OWNED BY terceros.idtercero;


--
-- Name: terceros_idtercero_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('terceros_idtercero_seq', 44, true);


--
-- Name: terceros_nit_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE terceros_nit_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.terceros_nit_seq OWNER TO postgres;

--
-- Name: terceros_nit_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE terceros_nit_seq OWNED BY terceros.nit;


--
-- Name: terceros_nit_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('terceros_nit_seq', 1, false);


--
-- Name: usuarios_idusuario_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE usuarios_idusuario_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.usuarios_idusuario_seq OWNER TO postgres;

--
-- Name: usuarios_idusuario_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('usuarios_idusuario_seq', 384, true);


--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE usuarios (
    idusuario integer DEFAULT nextval('usuarios_idusuario_seq'::regclass) NOT NULL,
    idestado integer NOT NULL,
    perfil integer NOT NULL,
    alias character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    fechaingreso date,
    email character varying(255) NOT NULL,
    email2 text,
    nombreusuario text
);


ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: vencimientoproductos; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE vencimientoproductos (
    idvencimientoproducto integer NOT NULL,
    fechavencimiento date,
    idproducto integer,
    cantidad integer,
    alerta integer,
    idbodega integer
);


ALTER TABLE public.vencimientoproductos OWNER TO postgres;

--
-- Name: vencimientoproductos_idvencimientoproducto_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE vencimientoproductos_idvencimientoproducto_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.vencimientoproductos_idvencimientoproducto_seq OWNER TO postgres;

--
-- Name: vencimientoproductos_idvencimientoproducto_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE vencimientoproductos_idvencimientoproducto_seq OWNED BY vencimientoproductos.idvencimientoproducto;


--
-- Name: vencimientoproductos_idvencimientoproducto_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('vencimientoproductos_idvencimientoproducto_seq', 9, true);


--
-- Name: ventas_idventa_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE ventas_idventa_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.ventas_idventa_seq OWNER TO postgres;

--
-- Name: ventas_idventa_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('ventas_idventa_seq', 501, true);


--
-- Name: ventas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE ventas (
    idventa integer DEFAULT nextval('ventas_idventa_seq'::regclass) NOT NULL,
    precioventa double precision NOT NULL,
    urlarchivo text,
    idbodega integer,
    idproducto integer,
    cantidadventa double precision,
    ivaventa double precision,
    fechaventa timestamp without time zone,
    fecharealventa date
);


ALTER TABLE public.ventas OWNER TO postgres;

--
-- Name: idbodegaproductos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE bodegasproductos ALTER COLUMN idbodegaproductos SET DEFAULT nextval('bodegasproductos_idbodegaproductos_seq'::regclass);


--
-- Name: idcomision; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE comisiones ALTER COLUMN idcomision SET DEFAULT nextval('comisiones_idcomision_seq'::regclass);


--
-- Name: iddetallecomision; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE detallecomisiones ALTER COLUMN iddetallecomision SET DEFAULT nextval('detallecomisiones_iddetallecomision_seq'::regclass);


--
-- Name: iddetallecodumentos; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE detalledocumentos ALTER COLUMN iddetallecodumentos SET DEFAULT nextval('detalledocumentos_iddetallecodumentos_seq'::regclass);


--
-- Name: iddocumento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE documentos ALTER COLUMN iddocumento SET DEFAULT nextval('documentos_iddocumento_seq'::regclass);


--
-- Name: idmovimiento; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE movimientos ALTER COLUMN idmovimiento SET DEFAULT nextval('movimientos_idmovimiento_seq'::regclass);


--
-- Name: idperiodo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE periodos ALTER COLUMN idperiodo SET DEFAULT nextval('periodos_idperiodo_seq'::regclass);


--
-- Name: idperiodosventa; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE periodosventa ALTER COLUMN idperiodosventa SET DEFAULT nextval('periodosventa_idperiodosventa_seq'::regclass);


--
-- Name: idproductosproveedores; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE productosproveedores ALTER COLUMN idproductosproveedores SET DEFAULT nextval('productosproveedores_idproductosproveedores_seq'::regclass);


--
-- Name: idremision; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE remisiones ALTER COLUMN idremision SET DEFAULT nextval('remisiones_idremision_seq'::regclass);


--
-- Name: idresolucionfactura; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE resolucionfacturas ALTER COLUMN idresolucionfactura SET DEFAULT nextval('resolucionfacturas_idresolucionfactura_seq'::regclass);


--
-- Name: idsaldoinventario; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE saldoinventario ALTER COLUMN idsaldoinventario SET DEFAULT nextval('saldoinventario_idsaldoinventario_seq'::regclass);


--
-- Name: idtercero; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE terceros ALTER COLUMN idtercero SET DEFAULT nextval('terceros_idtercero_seq'::regclass);


--
-- Name: idvencimientoproducto; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE vencimientoproductos ALTER COLUMN idvencimientoproducto SET DEFAULT nextval('vencimientoproductos_idvencimientoproducto_seq'::regclass);


--
-- Data for Name: barrios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO barrios VALUES (1, 1, 'LA CALLEJA', 1, NULL);
INSERT INTO barrios VALUES (2, 1, 'COUNTRY CLUB', 1, NULL);
INSERT INTO barrios VALUES (3, 1, 'LA CAROLINA', 1, NULL);
INSERT INTO barrios VALUES (4, 1, 'BELLA SUIZA', 1, NULL);
INSERT INTO barrios VALUES (5, 1, 'GINEBRA', 1, NULL);
INSERT INTO barrios VALUES (6, 1, 'SAN GABRIEL NORTE', 1, NULL);
INSERT INTO barrios VALUES (7, 1, 'USAQUEN', 1, NULL);
INSERT INTO barrios VALUES (8, 1, 'SANTA ANA', 1, NULL);
INSERT INTO barrios VALUES (9, 1, 'ESCUELA DE CABALLERIA I', 1, NULL);
INSERT INTO barrios VALUES (10, 1, 'ESCUELA DE INFANTERIA', 1, NULL);
INSERT INTO barrios VALUES (11, 1, 'RINCON DEL CHICO', 1, NULL);
INSERT INTO barrios VALUES (12, 1, 'SANTA BIBIANA', 1, NULL);
INSERT INTO barrios VALUES (13, 1, 'SANTABARBARA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (14, 1, 'SANTAANA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (15, 1, 'SANTA BARBARA CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (16, 1, 'MOLINOS NORTE', 1, NULL);
INSERT INTO barrios VALUES (17, 1, 'SANTA BARBARA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (18, 1, 'SAN PATRICIO', 1, NULL);
INSERT INTO barrios VALUES (19, 1, 'ESCUELA DE CABALLERIA II', 1, NULL);
INSERT INTO barrios VALUES (20, 1, 'SEGUNDO CONTADOR', 1, NULL);
INSERT INTO barrios VALUES (21, 1, 'GINEBRA II', 1, NULL);
INSERT INTO barrios VALUES (22, 1, 'SAN GABRIEL NORTE II', 1, NULL);
INSERT INTO barrios VALUES (23, 1, 'ELTOBERIN', 1, NULL);
INSERT INTO barrios VALUES (24, 1, 'LA PRADERA NORTE', 1, NULL);
INSERT INTO barrios VALUES (25, 1, 'SANTA TERESA', 1, NULL);
INSERT INTO barrios VALUES (26, 1, 'LA CITA', 1, NULL);
INSERT INTO barrios VALUES (27, 1, 'SAN CRISTOBAL NORTE', 1, NULL);
INSERT INTO barrios VALUES (28, 1, 'BARRANCAS NORTE', 1, NULL);
INSERT INTO barrios VALUES (29, 1, 'BARRANCAS', 1, NULL);
INSERT INTO barrios VALUES (30, 1, 'CEDRO SALAZAR', 1, NULL);
INSERT INTO barrios VALUES (31, 1, 'LOS CEDROS ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (32, 1, 'ACACIAS USAQUEN', 1, NULL);
INSERT INTO barrios VALUES (33, 1, 'CEDRO NARVAEZ', 1, NULL);
INSERT INTO barrios VALUES (34, 1, 'CEDRITOS', 1, NULL);
INSERT INTO barrios VALUES (35, 1, 'LISBOA', 1, NULL);
INSERT INTO barrios VALUES (36, 1, 'EL CONTADOR', 1, NULL);
INSERT INTO barrios VALUES (37, 1, 'LOS CEDROS', 1, NULL);
INSERT INTO barrios VALUES (38, 1, 'LAS ORQUIDEAS', 1, NULL);
INSERT INTO barrios VALUES (39, 1, 'LA LIBERTA', 1, NULL);
INSERT INTO barrios VALUES (40, 1, 'CAOBOS SALAZAR', 1, NULL);
INSERT INTO barrios VALUES (41, 1, 'ESTRELLA DEL NORTE', 1, NULL);
INSERT INTO barrios VALUES (42, 1, 'BOSQUE DE PINOS', 1, NULL);
INSERT INTO barrios VALUES (43, 1, 'TIBABITA', 1, NULL);
INSERT INTO barrios VALUES (44, 1, 'EL ROCIO NORTE', 1, NULL);
INSERT INTO barrios VALUES (45, 1, 'SAN ANTONIO NORTE', 1, NULL);
INSERT INTO barrios VALUES (46, 1, 'LA GRANJA NORTE', 1, NULL);
INSERT INTO barrios VALUES (47, 1, 'LAURIBE', 1, NULL);
INSERT INTO barrios VALUES (48, 1, 'ELVERVENAL', 1, NULL);
INSERT INTO barrios VALUES (49, 1, 'EL CEREZO', 1, NULL);
INSERT INTO barrios VALUES (50, 1, 'SAN ANTONIO NOROCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (51, 1, 'SAN JOSE DE USAQUEN', 1, NULL);
INSERT INTO barrios VALUES (52, 1, 'LAS MARGARITAS', 1, NULL);
INSERT INTO barrios VALUES (53, 1, 'EL REDIL', 1, NULL);
INSERT INTO barrios VALUES (54, 1, 'HORIZONTES NORTE', 1, NULL);
INSERT INTO barrios VALUES (55, 1, 'BUENAVISTA', 1, NULL);
INSERT INTO barrios VALUES (56, 1, 'BOSQUE DE PINOS I', 1, NULL);
INSERT INTO barrios VALUES (57, 1, 'VERBENAL SAN ANTONIO', 1, NULL);
INSERT INTO barrios VALUES (58, 1, 'BOSQUE DE PINOS III', 1, NULL);
INSERT INTO barrios VALUES (59, 1, 'TORCA I', 1, NULL);
INSERT INTO barrios VALUES (60, 1, 'LA ESTRELLITAI', 1, NULL);
INSERT INTO barrios VALUES (61, 1, 'LA ESTRELLITAII', 1, NULL);
INSERT INTO barrios VALUES (62, 1, 'LA ESTRELLITA III', 1, NULL);
INSERT INTO barrios VALUES (63, 1, 'CANAIMA', 1, NULL);
INSERT INTO barrios VALUES (64, 2, 'EL PARAISO', 1, NULL);
INSERT INTO barrios VALUES (65, 2, 'CATALUÃ‘A', 1, NULL);
INSERT INTO barrios VALUES (66, 2, 'SUCRE', 1, NULL);
INSERT INTO barrios VALUES (67, 2, 'QUINTA CAMACHO', 1, NULL);
INSERT INTO barrios VALUES (68, 2, 'EMAUS', 1, NULL);
INSERT INTO barrios VALUES (69, 2, 'LAS ACACIAS', 1, NULL);
INSERT INTO barrios VALUES (70, 2, 'GRANADA', 1, NULL);
INSERT INTO barrios VALUES (71, 2, 'MARIA CRISTINA', 1, NULL);
INSERT INTO barrios VALUES (72, 2, 'LA SALLE', 1, NULL);
INSERT INTO barrios VALUES (73, 2, 'BOSQUE CALDERON', 1, NULL);
INSERT INTO barrios VALUES (74, 2, 'PARDO RUBIO', 1, NULL);
INSERT INTO barrios VALUES (75, 2, 'JUAN XXIII', 1, NULL);
INSERT INTO barrios VALUES (76, 2, 'MARLY', 1, NULL);
INSERT INTO barrios VALUES (77, 2, 'CHAPINERO CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (78, 2, 'CHAPINERO NORTE', 1, NULL);
INSERT INTO barrios VALUES (79, 2, 'INGEMAR', 1, NULL);
INSERT INTO barrios VALUES (80, 2, 'SIBERIA CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (81, 2, 'CHICO NORTE II SECTOR', 1, NULL);
INSERT INTO barrios VALUES (82, 2, 'SEMINARIO', 1, NULL);
INSERT INTO barrios VALUES (83, 2, 'EL REFUGIO', 1, NULL);
INSERT INTO barrios VALUES (84, 2, 'LOS ROSALES', 1, NULL);
INSERT INTO barrios VALUES (85, 2, 'BELLAVISTA', 1, NULL);
INSERT INTO barrios VALUES (86, 2, 'PORCIUNCULA', 1, NULL);
INSERT INTO barrios VALUES (87, 2, 'CHICO NORTE', 1, NULL);
INSERT INTO barrios VALUES (88, 2, 'EL CHICO', 1, NULL);
INSERT INTO barrios VALUES (89, 2, 'LA CABRERA', 1, NULL);
INSERT INTO barrios VALUES (90, 2, 'EL RETIRO', 1, NULL);
INSERT INTO barrios VALUES (91, 2, 'ELNOGAL', 1, NULL);
INSERT INTO barrios VALUES (92, 2, 'ESPARTILLAL', 1, NULL);
INSERT INTO barrios VALUES (93, 2, 'LAGO GAITAN', 1, NULL);
INSERT INTO barrios VALUES (94, 2, 'ANTIGUO COUNTRY', 1, NULL);
INSERT INTO barrios VALUES (95, 2, 'CHICO NORTE III SECTOR', 1, NULL);
INSERT INTO barrios VALUES (96, 2, 'ELBAGAZAL', 1, NULL);
INSERT INTO barrios VALUES (97, 3, 'LA ALAMEDA', 1, NULL);
INSERT INTO barrios VALUES (98, 3, 'LAS NIEVES', 1, NULL);
INSERT INTO barrios VALUES (99, 3, 'SANTA INES', 1, NULL);
INSERT INTO barrios VALUES (100, 3, 'LA CAPUCHINA', 1, NULL);
INSERT INTO barrios VALUES (101, 3, 'VERACRUZ', 1, NULL);
INSERT INTO barrios VALUES (102, 3, 'SAN BERNARDINO', 1, NULL);
INSERT INTO barrios VALUES (103, 3, 'LAS CRUCES', 1, NULL);
INSERT INTO barrios VALUES (104, 3, 'EL GUAVIO', 1, NULL);
INSERT INTO barrios VALUES (105, 3, 'LA PENA', 1, NULL);
INSERT INTO barrios VALUES (106, 3, 'LOS LACHES', 1, NULL);
INSERT INTO barrios VALUES (107, 3, 'EL ROCIO', 1, NULL);
INSERT INTO barrios VALUES (108, 3, 'EL DORADO', 1, NULL);
INSERT INTO barrios VALUES (109, 3, 'RAMIREZ', 1, NULL);
INSERT INTO barrios VALUES (110, 3, 'GIRARDOT', 1, NULL);
INSERT INTO barrios VALUES (111, 3, 'LOURDES', 1, NULL);
INSERT INTO barrios VALUES (112, 3, 'SAN FRANCISCO RURAL', 1, NULL);
INSERT INTO barrios VALUES (113, 3, 'SAGRADO CORAZON', 1, NULL);
INSERT INTO barrios VALUES (114, 3, 'PARQUE NACIONAL', 1, NULL);
INSERT INTO barrios VALUES (115, 3, 'LA MERCED', 1, NULL);
INSERT INTO barrios VALUES (116, 3, 'LA PERSEVERANCIA', 1, NULL);
INSERT INTO barrios VALUES (117, 3, 'LA MACARENA', 1, NULL);
INSERT INTO barrios VALUES (118, 3, 'BOSQUE IZQUIERDO', 1, NULL);
INSERT INTO barrios VALUES (119, 3, 'SAN DIEGO', 1, NULL);
INSERT INTO barrios VALUES (120, 3, 'SAMPER', 1, NULL);
INSERT INTO barrios VALUES (121, 3, 'SAN MARTIN', 1, NULL);
INSERT INTO barrios VALUES (122, 3, 'PARQUE NACIONAL URBANO', 1, NULL);
INSERT INTO barrios VALUES (123, 4, 'LAS BRISAS', 1, NULL);
INSERT INTO barrios VALUES (124, 4, 'BUENOS AIRES', 1, NULL);
INSERT INTO barrios VALUES (125, 4, 'VITELMA', 1, NULL);
INSERT INTO barrios VALUES (126, 4, 'SANBLAS', 1, NULL);
INSERT INTO barrios VALUES (127, 4, 'LAS MERCEDES', 1, NULL);
INSERT INTO barrios VALUES (128, 4, 'SAN CRISTOBAL SUR', 1, NULL);
INSERT INTO barrios VALUES (129, 4, 'LA MARIA', 1, NULL);
INSERT INTO barrios VALUES (130, 4, 'SAN JAVIER', 1, NULL);
INSERT INTO barrios VALUES (131, 4, 'SANTA ANA SUR', 1, NULL);
INSERT INTO barrios VALUES (132, 4, 'PRIMERO DE MAYO', 1, NULL);
INSERT INTO barrios VALUES (133, 4, 'SAN BLAS II', 1, NULL);
INSERT INTO barrios VALUES (134, 4, 'VELODROMO', 1, NULL);
INSERT INTO barrios VALUES (135, 4, 'MONTE CARLO', 1, NULL);
INSERT INTO barrios VALUES (136, 4, 'TIBAQUE URBANO', 1, NULL);
INSERT INTO barrios VALUES (137, 4, 'SOCIEGO', 1, NULL);
INSERT INTO barrios VALUES (138, 4, 'QUINTA RAMOS', 1, NULL);
INSERT INTO barrios VALUES (139, 4, 'NARINO SUR', 1, NULL);
INSERT INTO barrios VALUES (140, 4, 'MODELO SUR', 1, NULL);
INSERT INTO barrios VALUES (141, 4, 'CÃLVOSUR', 1, NULL);
INSERT INTO barrios VALUES (142, 4, 'GRANADA SUR', 1, NULL);
INSERT INTO barrios VALUES (143, 4, 'MONTEBELLO', 1, NULL);
INSERT INTO barrios VALUES (144, 4, 'CORDOBA', 1, NULL);
INSERT INTO barrios VALUES (145, 4, 'BELLO HORIZONTE', 1, NULL);
INSERT INTO barrios VALUES (146, 4, 'ATENAS', 1, NULL);
INSERT INTO barrios VALUES (147, 4, 'SAN PEDRO', 1, NULL);
INSERT INTO barrios VALUES (148, 4, 'RAMAJAL', 1, NULL);
INSERT INTO barrios VALUES (149, 4, 'SANTAINES SUR', 1, NULL);
INSERT INTO barrios VALUES (150, 4, 'SAN VICENTE', 1, NULL);
INSERT INTO barrios VALUES (151, 4, 'LA VICTORIA', 1, NULL);
INSERT INTO barrios VALUES (152, 4, 'LA GLORIA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (153, 4, 'LOS ALPES', 1, NULL);
INSERT INTO barrios VALUES (154, 4, 'SAN JOSE SUR ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (155, 4, 'ALTAMIRA', 1, NULL);
INSERT INTO barrios VALUES (156, 4, 'MORALBA', 1, NULL);
INSERT INTO barrios VALUES (157, 4, 'PUENTE COLORADO', 1, NULL);
INSERT INTO barrios VALUES (158, 4, 'QUINDIO', 1, NULL);
INSERT INTO barrios VALUES (159, 4, 'LA GLORIA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (160, 4, 'NUEVA GLORIA', 1, NULL);
INSERT INTO barrios VALUES (161, 4, 'SAN MARTIN SUR', 1, NULL);
INSERT INTO barrios VALUES (162, 4, 'SAN RAFAEL USME', 1, NULL);
INSERT INTO barrios VALUES (163, 4, 'NUEVA DELHI', 1, NULL);
INSERT INTO barrios VALUES (164, 4, 'EL PINAR', 1, NULL);
INSERT INTO barrios VALUES (165, 4, 'TUAN REY (LA PAZ)', 1, NULL);
INSERT INTO barrios VALUES (166, 4, 'LOS LIBERTADORES', 1, NULL);
INSERT INTO barrios VALUES (167, 4, 'SANTA RITA SUR ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (169, 4, 'CANADA O GÃœIRA', 1, NULL);
INSERT INTO barrios VALUES (170, 4, 'ALTOS DEL ZUQUE', 1, NULL);
INSERT INTO barrios VALUES (171, 4, 'VILLABEL', 1, NULL);
INSERT INTO barrios VALUES (172, 4, 'ALTOS DEL POBLADO', 1, NULL);
INSERT INTO barrios VALUES (173, 4, 'LAS GAVIOTAS', 1, NULL);
INSERT INTO barrios VALUES (174, 4, 'LA BELLEZA', 1, NULL);
INSERT INTO barrios VALUES (175, 4, 'BOSQUE DE LOS ALPES', 1, NULL);
INSERT INTO barrios VALUES (176, 4, 'ALTOS DEL ZIPA', 1, NULL);
INSERT INTO barrios VALUES (177, 4, 'YOMASA', 1, NULL);
INSERT INTO barrios VALUES (178, 4, 'GUACAMAYAS II', 1, NULL);
INSERT INTO barrios VALUES (179, 4, 'GUACAMAYAS IV', 1, NULL);
INSERT INTO barrios VALUES (180, 4, 'GUACAMAYAS III', 1, NULL);
INSERT INTO barrios VALUES (181, 4, 'LAS GUACAMAYAS I', 1, NULL);
INSERT INTO barrios VALUES (182, 4, 'VILLA DEL CERRO', 1, NULL);
INSERT INTO barrios VALUES (183, 4, 'VEINTE DE TULIO', 1, NULL);
INSERT INTO barrios VALUES (184, 4, 'SAN ISIDRO', 1, NULL);
INSERT INTO barrios VALUES (185, 4, 'SURAMERICA', 1, NULL);
INSERT INTO barrios VALUES (186, 4, 'VILLA.DE LOS ALPES', 1, NULL);
INSERT INTO barrios VALUES (187, 4, 'LAS LOMAS !', 1, NULL);
INSERT INTO barrios VALUES (188, 4, 'BARCELONA SUR', 1, NULL);
INSERT INTO barrios VALUES (189, 4, 'VILLA DE LOS ALPES I', 1, NULL);
INSERT INTO barrios VALUES (190, 5, 'VILLA DIANA', 1, NULL);
INSERT INTO barrios VALUES (191, 5, 'JUAN JOSE RONDON I', 1, NULL);
INSERT INTO barrios VALUES (192, 5, 'LOS SOCHES', 1, NULL);
INSERT INTO barrios VALUES (193, 5, 'DONA LILIANA ,', 1, NULL);
INSERT INTO barrios VALUES (194, 5, 'JUAN REY SUR !', 1, NULL);
INSERT INTO barrios VALUES (195, 5, 'LA CABANA y', 1, NULL);
INSERT INTO barrios VALUES (196, 5, 'LA AURORA', 1, NULL);
INSERT INTO barrios VALUES (197, 5, 'NUEVO SAN ANDRES', 1, NULL);
INSERT INTO barrios VALUES (198, 5, 'GRANYOMASA', 1, NULL);
INSERT INTO barrios VALUES (199, 5, 'DANUBIO', 1, NULL);
INSERT INTO barrios VALUES (200, 5, 'LA ANDREA', 1, NULL);
INSERT INTO barrios VALUES (201, 5, 'BARRANQUILLITA', 1, NULL);
INSERT INTO barrios VALUES (202, 5, 'SANTA LIBRADA', 1, NULL);
INSERT INTO barrios VALUES (203, 5, 'LA CABANA', 1, NULL);
INSERT INTO barrios VALUES (204, 5, 'SANTA LIBRADA NORTE', 1, NULL);
INSERT INTO barrios VALUES (205, 5, 'MARICHUELA', 1, NULL);
INSERT INTO barrios VALUES (206, 5, 'MONTEBLANCO', 1, NULL);
INSERT INTO barrios VALUES (207, 5, 'CHUNIZA', 1, NULL);
INSERT INTO barrios VALUES (208, 5, 'USMINIA', 1, NULL);
INSERT INTO barrios VALUES (210, 5, 'SERRANIAS', 1, NULL);
INSERT INTO barrios VALUES (211, 5, 'COMUNEROS', 1, NULL);
INSERT INTO barrios VALUES (212, 5, 'EL VIRREY', 1, NULL);
INSERT INTO barrios VALUES (213, 5, 'DUITAMA', 1, NULL);
INSERT INTO barrios VALUES (214, 5, 'ALASKA', 1, NULL);
INSERT INTO barrios VALUES (215, 5, 'SAN JUAN BAUTISTA', 1, NULL);
INSERT INTO barrios VALUES (216, 5, 'DESARROLLO BRAZUELOS I', 1, NULL);
INSERT INTO barrios VALUES (217, 5, 'ELPEDREGAL', 1, NULL);
INSERT INTO barrios VALUES (218, 5, 'ANTONIO JOSE DE SUCRE ', 1, NULL);
INSERT INTO barrios VALUES (219, 5, 'SALAZARUSME', 1, NULL);
INSERT INTO barrios VALUES (220, 5, 'SERRANIAS I', 1, NULL);
INSERT INTO barrios VALUES (221, 5, 'DANUBIO II ', 1, NULL);
INSERT INTO barrios VALUES (222, 5, 'YOMASA NORTE', 1, NULL);
INSERT INTO barrios VALUES (223, 5, 'PORVENIR', 1, NULL);
INSERT INTO barrios VALUES (224, 5, 'LA FISGALA', 1, NULL);
INSERT INTO barrios VALUES (225, 5, 'DESARROLLO BRAZUELOS', 1, NULL);
INSERT INTO barrios VALUES (226, 5, 'TUNJUELITO', 1, NULL);
INSERT INTO barrios VALUES (227, 5, 'VILLA ISRAEL', 1, NULL);
INSERT INTO barrios VALUES (228, 5, 'LA FISCALA NORTE', 1, NULL);
INSERT INTO barrios VALUES (229, 5, 'CENTRO USME URBANO', 1, NULL);
INSERT INTO barrios VALUES (230, 5, 'ARRAYANES I', 1, NULL);
INSERT INTO barrios VALUES (231, 5, 'FISCALA ALTA', 1, NULL);
INSERT INTO barrios VALUES (232, 5, 'LOS OLIVARES', 1, NULL);
INSERT INTO barrios VALUES (233, 5, 'BOLONIA', 1, NULL);
INSERT INTO barrios VALUES (234, 5, 'ELCURUBO', 1, NULL);
INSERT INTO barrios VALUES (235, 5, 'LA ESPERANZA SUR', 1, NULL);
INSERT INTO barrios VALUES (236, 5, 'EL BOSQUE CENTRAL I', 1, NULL);
INSERT INTO barrios VALUES (237, 5, 'EL BOSQUE', 1, NULL);
INSERT INTO barrios VALUES (238, 5, 'CHAPINERITO', 1, NULL);
INSERT INTO barrios VALUES (239, 5, 'CHARALA', 1, NULL);
INSERT INTO barrios VALUES (240, 5, 'LA COMUNA', 1, NULL);
INSERT INTO barrios VALUES (241, 5, 'EL PROGRESO USME', 1, NULL);
INSERT INTO barrios VALUES (242, 5, 'LA ORQUIDEA DE USME', 1, NULL);
INSERT INTO barrios VALUES (243, 5, 'LA ESPERANZA DE USME', 1, NULL);
INSERT INTO barrios VALUES (244, 5, 'EL NUEVO PORTAL', 1, NULL);
INSERT INTO barrios VALUES (245, 5, 'EL REFUGIO I', 1, NULL);
INSERT INTO barrios VALUES (246, 5, 'PUERTA AL LLANO DE USME', 1, NULL);
INSERT INTO barrios VALUES (247, 5, 'VILLA ANITA', 1, NULL);
INSERT INTO barrios VALUES (248, 5, 'EL NUEVO PORTAL II', 1, NULL);
INSERT INTO barrios VALUES (249, 5, 'SAN FELIPE DE USME', 1, NULL);
INSERT INTO barrios VALUES (250, 5, 'TOCAIMITA ORIENTAL I', 1, NULL);
INSERT INTO barrios VALUES (251, 5, 'ARRAYANES V', 1, NULL);
INSERT INTO barrios VALUES (252, 5, 'BOLONIA I', 1, NULL);
INSERT INTO barrios VALUES (253, 5, 'LA REFORMA', 1, NULL);
INSERT INTO barrios VALUES (254, 5, 'EL NEVADO', 1, NULL);
INSERT INTO barrios VALUES (255, 5, 'EL PORTAL DEL DIVINO', 1, NULL);
INSERT INTO barrios VALUES (257, 5, 'LA REQUILINA', 1, NULL);
INSERT INTO barrios VALUES (258, 5, 'ELTUNO', 1, NULL);
INSERT INTO barrios VALUES (259, 5, 'BRISAS DEL LLANO', 1, NULL);
INSERT INTO barrios VALUES (260, 5, 'LA HUERTA', 1, NULL);
INSERT INTO barrios VALUES (261, 5, 'EL PEDREGAL II', 1, NULL);
INSERT INTO barrios VALUES (262, 5, 'EL PORTAL URBANO', 1, NULL);
INSERT INTO barrios VALUES (263, 6, 'TUNAL ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (264, 6, 'SAN VICENTE FERRER', 1, NULL);
INSERT INTO barrios VALUES (265, 6, 'VENECIA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (266, 6, 'VENECIA', 1, NULL);
INSERT INTO barrios VALUES (267, 6, 'ESCUELA GENERAL SANTANDER', 1, NULL);
INSERT INTO barrios VALUES (268, 6, 'SAMORE', 1, NULL);
INSERT INTO barrios VALUES (269, 6, 'EL CARMEN', 1, NULL);
INSERT INTO barrios VALUES (270, 6, 'FATTMA', 1, NULL);
INSERT INTO barrios VALUES (271, 6, 'NUEVO MUZU', 1, NULL);
INSERT INTO barrios VALUES (272, 6, 'PARQUE EL TUNAL', 1, NULL);
INSERT INTO barrios VALUES (273, 6, 'ISLA DEL SOL', 1, NULL);
INSERT INTO barrios VALUES (274, 6, 'MUZU', 1, NULL);
INSERT INTO barrios VALUES (275, 6, 'SAN CARLOS', 1, NULL);
INSERT INTO barrios VALUES (276, 6, 'ABRAHAM LINCOLN', 1, NULL);
INSERT INTO barrios VALUES (278, 6, 'SAN BENITO', 1, NULL);
INSERT INTO barrios VALUES (279, 6, 'AREA ARTILLERIA', 1, NULL);
INSERT INTO barrios VALUES (280, 7, 'SAN DIEGO-BOSA', 1, NULL);
INSERT INTO barrios VALUES (281, 7, 'ESCOCIA', 1, NULL);
INSERT INTO barrios VALUES (282, 7, 'LA PAZ BOSA', 1, NULL);
INSERT INTO barrios VALUES (283, 7, 'LA ESTACION BOSA', 1, NULL);
INSERT INTO barrios VALUES (284, 7, 'BOSA', 1, NULL);
INSERT INTO barrios VALUES (285, 7, 'JIMENEZ DE QUESADA', 1, NULL);
INSERT INTO barrios VALUES (286, 7, 'SAN PABLO BOSA', 1, NULL);
INSERT INTO barrios VALUES (287, 7, 'BOSA NOVA', 1, NULL);
INSERT INTO barrios VALUES (288, 7, 'NUEVA GRANADA BOSA', 1, NULL);
INSERT INTO barrios VALUES (289, 7, 'PASO ANCHO', 1, NULL);
INSERT INTO barrios VALUES (290, 7, 'CEMENTERIO JARDINES APOGEO', 1, NULL);
INSERT INTO barrios VALUES (291, 7, 'EL RETAZO', 1, NULL);
INSERT INTO barrios VALUES (292, 7, 'OLARTE', 1, NULL);
INSERT INTO barrios VALUES (293, 7, 'GRAN COLOMBIANO', 1, NULL);
INSERT INTO barrios VALUES (294, 7, 'VILLA DEL RIO', 1, NULL);
INSERT INTO barrios VALUES (295, 7, 'JOSE MARIA CARBONEL', 1, NULL);
INSERT INTO barrios VALUES (296, 7, 'GUALOCHE', 1, NULL);
INSERT INTO barrios VALUES (297, 7, 'ANDALUCIA II', 1, NULL);
INSERT INTO barrios VALUES (298, 7, 'EL JARDIN', 1, NULL);
INSERT INTO barrios VALUES (299, 7, 'VILLAS DEL PROGRESO', 1, NULL);
INSERT INTO barrios VALUES (300, 7, 'JORGE URIBE BOTERO', 1, NULL);
INSERT INTO barrios VALUES (301, 7, 'JOSE ANTONIO GALAN', 1, NULL);
INSERT INTO barrios VALUES (302, 7, 'ANTONIA SANTOS', 1, NULL);
INSERT INTO barrios VALUES (303, 7, 'CIUDADELA EL RECREO', 1, NULL);
INSERT INTO barrios VALUES (304, 7, 'CHARLES DE GAULLE', 1, NULL);
INSERT INTO barrios VALUES (305, 7, 'LOS LAURELES', 1, NULL);
INSERT INTO barrios VALUES (306, 7, 'SAN BERNARDINO XXII URBANO', 1, NULL);
INSERT INTO barrios VALUES (308, 7, 'BOSA NOVA EL PORVENIR', 1, NULL);
INSERT INTO barrios VALUES (309, 7, 'ARGELIA II', 1, NULL);
INSERT INTO barrios VALUES (310, 7, 'JIMENEZ DE QUESADAII SECTOR', 1, NULL);
INSERT INTO barrios VALUES (311, 7, 'LOS SAUCES', 1, NULL);
INSERT INTO barrios VALUES (312, 7, 'EL DANUBIO AZUL', 1, NULL);
INSERT INTO barrios VALUES (314, 7, 'SAN BERNARDINO XXV URBANO', 1, NULL);
INSERT INTO barrios VALUES (315, 7, 'EL PORTAL DEL BRASIL', 1, NULL);
INSERT INTO barrios VALUES (316, 7, 'SANMARTIN', 1, NULL);
INSERT INTO barrios VALUES (317, 7, 'LA LIBERTAD', 1, NULL);
INSERT INTO barrios VALUES (318, 7, 'SAN ANTONIO', 1, NULL);
INSERT INTO barrios VALUES (319, 7, 'CHICO SUR', 1, NULL);
INSERT INTO barrios VALUES (320, 7, 'SAN BERNARDINO I', 1, NULL);
INSERT INTO barrios VALUES (321, 7, 'VILLA ANNYI', 1, NULL);
INSERT INTO barrios VALUES (322, 7, 'VILLA ANNYII', 1, NULL);
INSERT INTO barrios VALUES (323, 7, 'REMANSO URBANO', 1, NULL);
INSERT INTO barrios VALUES (324, 7, 'BRASILIA', 1, NULL);
INSERT INTO barrios VALUES (325, 7, 'CHICALA', 1, NULL);
INSERT INTO barrios VALUES (326, 7, 'OSORIO X URBANO', 1, NULL);
INSERT INTO barrios VALUES (327, 7, 'BRASIL', 1, NULL);
INSERT INTO barrios VALUES (328, 7, 'SAN BERNÃ€RDINO POTRERITOS', 1, NULL);
INSERT INTO barrios VALUES (329, 7, 'LA VEGA San bernardino', 1, NULL);
INSERT INTO barrios VALUES (330, 7, 'EL REMANSO I', 1, NULL);
INSERT INTO barrios VALUES (331, 7, 'BETANIA', 1, NULL);
INSERT INTO barrios VALUES (332, 7, 'PARCELA EL PORVENIR', 1, NULL);
INSERT INTO barrios VALUES (333, 7, 'EL CORZO', 1, NULL);
INSERT INTO barrios VALUES (335, 7, 'SANTA FE BOSA', 1, NULL);
INSERT INTO barrios VALUES (336, 7, 'CANAVERALETO', 1, NULL);
INSERT INTO barrios VALUES (337, 7, 'SAN BERNARDINO II', 1, NULL);
INSERT INTO barrios VALUES (339, 7, 'CIUDADELA EL RECREO II', 1, NULL);
INSERT INTO barrios VALUES (340, 7, 'LA INDEPENDENCIA', 1, NULL);
INSERT INTO barrios VALUES (341, 7, 'ISLANDIA ', 1, NULL);
INSERT INTO barrios VALUES (342, 7, 'EL CORZO I', 1, NULL);
INSERT INTO barrios VALUES (344, 8, 'HIPOTECHO', 1, NULL);
INSERT INTO barrios VALUES (345, 8, 'HIPOTECHO OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (346, 8, 'PROVTVIENDA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (347, 8, 'PROVTVIENDA', 1, NULL);
INSERT INTO barrios VALUES (348, 8, 'PROVTVIENDA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (349, 8, 'LA CAMPIÃ‘A', 1, NULL);
INSERT INTO barrios VALUES (350, 8, 'CIUDAD KENNEDY SUR', 1, NULL);
INSERT INTO barrios VALUES (351, 8, 'CIUDAD KENNEDY OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (352, 8, 'CIUDAD :KENNEDY', 1, NULL);
INSERT INTO barrios VALUES (353, 8, 'CIUDAD KENNEDY ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (354, 8, 'CIUDAD KENNEDY CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (355, 8, 'TIMTZA', 1, NULL);
INSERT INTO barrios VALUES (356, 8, 'CIUDAD KENNEDY NORTE', 1, NULL);
INSERT INTO barrios VALUES (357, 8, 'TUNDAMA', 1, NULL);
INSERT INTO barrios VALUES (358, 8, 'BOITA ', 1, NULL);
INSERT INTO barrios VALUES (359, 8, 'JACQUELINE', 1, NULL);
INSERT INTO barrios VALUES (360, 8, 'TIMIZAA', 1, NULL);
INSERT INTO barrios VALUES (361, 8, 'PASTRANA', 1, NULL);
INSERT INTO barrios VALUES (362, 8, 'TIMIZAB', 1, NULL);
INSERT INTO barrios VALUES (363, 8, 'MANDALAY', 1, NULL);
INSERT INTO barrios VALUES (364, 8, 'LA CECILIA', 1, NULL);
INSERT INTO barrios VALUES (365, 8, 'ROMA', 1, NULL);
INSERT INTO barrios VALUES (366, 8, 'CLASS', 1, NULL);
INSERT INTO barrios VALUES (367, 8, 'EL RUBI', 1, NULL);
INSERT INTO barrios VALUES (368, 8, 'CASABLANCA', 1, NULL);
INSERT INTO barrios VALUES (369, 8, 'CATALINA II', 1, NULL);
INSERT INTO barrios VALUES (370, 8, 'EL PARAISO BOSA', 1, NULL);
INSERT INTO barrios VALUES (371, 8, 'ALQUERIA LA FRAGUA NORTE', 1, NULL);
INSERT INTO barrios VALUES (372, 8, 'ALQUERIA LA FRAGUA', 1, NULL);
INSERT INTO barrios VALUES (373, 8, 'LAS DELICIAS', 1, NULL);
INSERT INTO barrios VALUES (374, 8, 'CATALINA', 1, NULL);
INSERT INTO barrios VALUES (375, 8, 'CORABASTOS', 1, NULL);
INSERT INTO barrios VALUES (376, 8, 'TECHO', 1, NULL);
INSERT INTO barrios VALUES (377, 8, 'NUEVA YORK', 1, NULL);
INSERT INTO barrios VALUES (378, 8, 'HIPOTECHO SUR', 1, NULL);
INSERT INTO barrios VALUES (379, 8, 'PATIO BONITO', 1, NULL);
INSERT INTO barrios VALUES (380, 8, 'PATIO BONITO II', 1, NULL);
INSERT INTO barrios VALUES (381, 8, 'GRAN BRITALLAI', 1, NULL);
INSERT INTO barrios VALUES (382, 8, 'GRAN BRITALIA', 1, NULL);
INSERT INTO barrios VALUES (383, 8, 'CAMPO HERMOSO', 1, NULL);
INSERT INTO barrios VALUES (384, 8, 'EL CARMELO', 1, NULL);
INSERT INTO barrios VALUES (385, 8, 'SAUCEDAL', 1, NULL);
INSERT INTO barrios VALUES (386, 8, 'LLANO GRANDE', 1, NULL);
INSERT INTO barrios VALUES (387, 8, 'TAIRONA', 1, NULL);
INSERT INTO barrios VALUES (388, 8, 'TOCAREMA', 1, NULL);
INSERT INTO barrios VALUES (389, 8, 'PATIO BONITO III', 1, NULL);
INSERT INTO barrios VALUES (390, 8, 'CASA BLANCA SUR', 1, NULL);
INSERT INTO barrios VALUES (391, 8, 'VILLA NELLY III SECTOR', 1, NULL);
INSERT INTO barrios VALUES (392, 8, 'TIMIZAC', 1, NULL);
INSERT INTO barrios VALUES (393, 8, 'RENANIA URAPANES', 1, NULL);
INSERT INTO barrios VALUES (394, 8, 'SANTA CATALINA', 1, NULL);
INSERT INTO barrios VALUES (395, 8, 'ALQUERIA LA FRAGUA II', 1, NULL);
INSERT INTO barrios VALUES (396, 8, 'CALANDAIMA', 1, NULL);
INSERT INTO barrios VALUES (398, 8, 'CIUDAD DE CALI', 1, NULL);
INSERT INTO barrios VALUES (399, 8, 'LOS ALMENDROS', 1, NULL);
INSERT INTO barrios VALUES (400, 8, 'EL JAZMIN', 1, NULL);
INSERT INTO barrios VALUES (401, 8, 'DINDALITO', 1, NULL);
INSERT INTO barrios VALUES (402, 8, 'PROVIVIENDA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (404, 8, 'OSORIO XII', 1, NULL);
INSERT INTO barrios VALUES (405, 8, 'TINTALITO', 1, NULL);
INSERT INTO barrios VALUES (406, 8, 'DINTALITÃ–', 1, NULL);
INSERT INTO barrios VALUES (407, 8, 'CHUCUA DE LA VACA III', 1, NULL);
INSERT INTO barrios VALUES (408, 8, 'CHUCÃœA! DE LA VACA II', 1, NULL);
INSERT INTO barrios VALUES (409, 8, 'CHUCUA DE LA VACA I', 1, NULL);
INSERT INTO barrios VALUES (411, 8, 'GALAN', 1, NULL);
INSERT INTO barrios VALUES (412, 8, 'COOPERATIVA DE SUBOFICIALES', 1, NULL);
INSERT INTO barrios VALUES (413, 8, 'MARSELLA', 1, NULL);
INSERT INTO barrios VALUES (414, 8, 'VISION DE ORIENTE', 1, NULL);
INSERT INTO barrios VALUES (415, 8, 'BAVARIA', 1, NULL);
INSERT INTO barrios VALUES (416, 8, 'PIO XII', 1, NULL);
INSERT INTO barrios VALUES (417, 8, 'CASTILLA', 1, NULL);
INSERT INTO barrios VALUES (418, 8, 'NUEVO TECHO', 1, NULL);
INSERT INTO barrios VALUES (419, 8, 'LAS DOS AVENIDAS', 1, NULL);
INSERT INTO barrios VALUES (420, 8, 'LUSITANIA', 1, NULL);
INSERT INTO barrios VALUES (421, 8, 'VILLA ALSACIAII', 1, NULL);
INSERT INTO barrios VALUES (422, 8, 'LA PAMPA', 1, NULL);
INSERT INTO barrios VALUES (423, 8, 'VILLA ALISACIA', 1, NULL);
INSERT INTO barrios VALUES (424, 8, 'VERGEL OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (425, 8, 'VALLADOLID', 1, NULL);
INSERT INTO barrios VALUES (426, 8, 'TINTALA', 1, NULL);
INSERT INTO barrios VALUES (427, 8, 'MARIA PAZ', 1, NULL);
INSERT INTO barrios VALUES (428, 8, 'OSORIO III', 1, NULL);
INSERT INTO barrios VALUES (429, 8, 'LA MAGDALENA', 1, NULL);
INSERT INTO barrios VALUES (430, 8, 'EL VERGEL', 1, NULL);
INSERT INTO barrios VALUES (431, 8, 'EL VERGEL ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (432, 8, 'CIUDAD TECHO', 1, NULL);
INSERT INTO barrios VALUES (433, 8, 'EL TINTALIII', 1, NULL);
INSERT INTO barrios VALUES (434, 8, 'EL TINTALIV', 1, NULL);
INSERT INTO barrios VALUES (435, 9, 'AEROPUERTO EL DORADO', 1, NULL);
INSERT INTO barrios VALUES (436, 9, 'LAS NAVETAS', 1, NULL);
INSERT INTO barrios VALUES (437, 9, 'PUEBLO VIEJO', 1, NULL);
INSERT INTO barrios VALUES (438, 9, 'SANTA CECILIA', 1, NULL);
INSERT INTO barrios VALUES (439, 9, 'CAPELLANIA', 1, NULL);
INSERT INTO barrios VALUES (440, 9, 'LA ESPERANZA NORTE', 1, NULL);
INSERT INTO barrios VALUES (441, 9, 'GRANJAS DE TECHO', 1, NULL);
INSERT INTO barrios VALUES (442, 9, 'MONTEVIDEO', 1, NULL);
INSERT INTO barrios VALUES (443, 9, 'FRANCO', 1, NULL);
INSERT INTO barrios VALUES (444, 9, 'MODELLA', 1, NULL);
INSERT INTO barrios VALUES (445, 9, 'MODELLA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (446, 9, 'SALITRE OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (448, 9, 'BOSQUE DE MODELLA', 1, NULL);
INSERT INTO barrios VALUES (449, 9, 'TERMINAL DE TRANSPORTES', 1, NULL);
INSERT INTO barrios VALUES (450, 9, 'CIUDAD HAYUELOS', 1, NULL);
INSERT INTO barrios VALUES (451, 9, 'VERSALLES FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (452, 9, 'LA CABANA FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (453, 9, 'SAN JOSE DE FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (454, 9, 'PUERTA DE TEJA', 1, NULL);
INSERT INTO barrios VALUES (455, 9, 'FERROCAJA FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (456, 9, 'VILLEMAR', 1, NULL);
INSERT INTO barrios VALUES (457, 9, 'GUADUAL FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (458, 9, 'EL CARMEN FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (459, 9, 'BELEN FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (460, 9, 'CENTRO FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (461, 9, 'CHARCO URBANO', 1, NULL);
INSERT INTO barrios VALUES (462, 9, 'SAN PABLO JERICO', 1, NULL);
INSERT INTO barrios VALUES (463, 9, 'BRISAS. ALDEA FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (464, 9, 'LA LAGUNA FONTIBON', 1, NULL);
INSERT INTO barrios VALUES (465, 9, 'ATAHUALPA', 1, NULL);
INSERT INTO barrios VALUES (466, 9, 'VILLA CARMENZA', 1, NULL);
INSERT INTO barrios VALUES (467, 9, 'PUENTE GRANDE', 1, NULL);
INSERT INTO barrios VALUES (469, 9, 'LA GIRALDA', 1, NULL);
INSERT INTO barrios VALUES (470, 9, 'EL TINTAL CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (471, 9, 'MORAVTA', 1, NULL);
INSERT INTO barrios VALUES (472, 9, 'ZONA FRANCA', 1, NULL);
INSERT INTO barrios VALUES (473, 9, 'SABANA GRANDE', 1, NULL);
INSERT INTO barrios VALUES (474, 9, 'EL TINTAL II', 1, NULL);
INSERT INTO barrios VALUES (475, 9, 'SAN PEDRO DE LOS ROBLES', 1, NULL);
INSERT INTO barrios VALUES (476, 9, 'ELCHANCO I', 1, NULL);
INSERT INTO barrios VALUES (477, 9, 'INTERINDUSTRIAL', 1, NULL);
INSERT INTO barrios VALUES (478, 9, 'KASANDRA', 1, NULL);
INSERT INTO barrios VALUES (479, 10, 'LAS FERIAS', 1, NULL);
INSERT INTO barrios VALUES (480, 10, 'LAS FERIAS OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (481, 10, 'BONANZA', 1, NULL);
INSERT INTO barrios VALUES (482, 10, 'PALO BLANCO', 1, NULL);
INSERT INTO barrios VALUES (483, 10, 'LA ESTRADA', 1, NULL);
INSERT INTO barrios VALUES (484, 10, 'BELLAVISTA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (485, 10, 'LA ESTRADITA', 1, NULL);
INSERT INTO barrios VALUES (486, 10, 'BOSQUE POPULAR', 1, NULL);
INSERT INTO barrios VALUES (487, 10, 'JARDIN BOTANICO', 1, NULL);
INSERT INTO barrios VALUES (488, 10, 'NORMANDIA', 1, NULL);
INSERT INTO barrios VALUES (490, 10, 'SAN JOAQUIN', 1, NULL);
INSERT INTO barrios VALUES (491, 10, 'EL LAUREL', 1, NULL);
INSERT INTO barrios VALUES (492, 10, 'EL MINUTO DE DIOS', 1, NULL);
INSERT INTO barrios VALUES (493, 10, 'SANTAMARIA', 1, NULL);
INSERT INTO barrios VALUES (494, 10, 'BOYACA', 1, NULL);
INSERT INTO barrios VALUES (495, 10, 'EL REAL', 1, NULL);
INSERT INTO barrios VALUES (496, 10, 'EL ENCANTO', 1, NULL);
INSERT INTO barrios VALUES (497, 10, 'NORMANDIA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (498, 10, 'SAN IGNACIO', 1, NULL);
INSERT INTO barrios VALUES (499, 10, 'SANTA HELENITA', 1, NULL);
INSERT INTO barrios VALUES (500, 10, 'TABORA', 1, NULL);
INSERT INTO barrios VALUES (501, 10, 'LA GRANJA', 1, NULL);
INSERT INTO barrios VALUES (502, 10, 'AUTOPISTA MEDELLIN', 1, NULL);
INSERT INTO barrios VALUES (503, 10, 'PARIS GAITAN', 1, NULL);
INSERT INTO barrios VALUES (504, 10, 'LA SERENA', 1, NULL);
INSERT INTO barrios VALUES (505, 10, 'VILLA LUZ', 1, NULL);
INSERT INTO barrios VALUES (506, 10, 'LA SOLEDAD NORTE', 1, NULL);
INSERT INTO barrios VALUES (507, 10, 'LOS CEREZOS', 1, NULL);
INSERT INTO barrios VALUES (508, 10, 'PRIMAVERA', 1, NULL);
INSERT INTO barrios VALUES (509, 10, 'PARIS', 1, NULL);
INSERT INTO barrios VALUES (510, 10, 'FLORENCIA', 1, NULL);
INSERT INTO barrios VALUES (511, 10, 'FLORIDA BLANCA', 1, NULL);
INSERT INTO barrios VALUES (512, 10, 'BOLTVIA', 1, NULL);
INSERT INTO barrios VALUES (513, 10, 'LOS ANGELES', 1, NULL);
INSERT INTO barrios VALUES (514, 10, 'LOS ALAMOS', 1, NULL);
INSERT INTO barrios VALUES (516, 10, 'GARCES NAVAS', 1, NULL);
INSERT INTO barrios VALUES (517, 10, 'GARCES NAVAS ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (518, 10, 'EL CEDRO', 1, NULL);
INSERT INTO barrios VALUES (519, 10, 'CIUDAD. BACHUE', 1, NULL);
INSERT INTO barrios VALUES (520, 10, 'CIUDAD BACHUE I ETAPA', 1, NULL);
INSERT INTO barrios VALUES (521, 10, 'BOCHICA', 1, NULL);
INSERT INTO barrios VALUES (522, 10, 'EL CORTIJO', 1, NULL);
INSERT INTO barrios VALUES (523, 10, 'EL MADRI.GAL', 1, NULL);
INSERT INTO barrios VALUES (524, 10, 'ENGATTVA ZONA URBANA', 1, NULL);
INSERT INTO barrios VALUES (525, 10, 'VILLA GLADYS', 1, NULL);
INSERT INTO barrios VALUES (527, 10, 'QUIRIGUA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (528, 10, 'BOLTVLA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (529, 10, 'SANTA MONICA', 1, NULL);
INSERT INTO barrios VALUES (530, 10, 'ALAMOS', 1, NULL);
INSERT INTO barrios VALUES (531, 10, 'BOCHICA II', 1, NULL);
INSERT INTO barrios VALUES (532, 10, 'VILLAS DE GRANADA', 1, NULL);
INSERT INTO barrios VALUES (533, 10, 'VILLA AMALLA', 1, NULL);
INSERT INTO barrios VALUES (534, 10, 'VILLAS DE GRANADA I', 1, NULL);
INSERT INTO barrios VALUES (535, 10, 'CIUD ADELA COLSUBSIDIO', 1, NULL);
INSERT INTO barrios VALUES (536, 10, 'EL MUELLE', 1, NULL);
INSERT INTO barrios VALUES (537, 10, 'GRAN GRANADA', 1, NULL);
INSERT INTO barrios VALUES (538, 10, 'GARCES NAVAS SUR', 1, NULL);
INSERT INTO barrios VALUES (539, 10, 'SABANA DEL DORADO', 1, NULL);
INSERT INTO barrios VALUES (540, 10, 'VILLA SAGRARIO', 1, NULL);
INSERT INTO barrios VALUES (541, 10, 'SAN ANTONIO URBANO', 1, NULL);
INSERT INTO barrios VALUES (542, 10, 'LUIS CARLOS GALAN', 1, NULL);
INSERT INTO barrios VALUES (544, 10, 'EL DORADO INPUSTTOÃL', 1, NULL);
INSERT INTO barrios VALUES (546, 10, 'MARANDU', 1, NULL);
INSERT INTO barrios VALUES (547, 10, 'LA FAENA', 1, NULL);
INSERT INTO barrios VALUES (548, 10, 'CENTRO ENGATTVA II', 1, NULL);
INSERT INTO barrios VALUES (549, 10, 'VILLAS DE ALCALA', 1, NULL);
INSERT INTO barrios VALUES (550, 10, 'EL GACO', 1, NULL);
INSERT INTO barrios VALUES (551, 10, 'LA RTVIERA', 1, NULL);
INSERT INTO barrios VALUES (553, 10, 'SAN ANTONIO ENGATTVA', 1, NULL);
INSERT INTO barrios VALUES (554, 10, 'VILLA DEL MAR', 1, NULL);
INSERT INTO barrios VALUES (555, 10, 'CIUDAD BACHUE II', 1, NULL);
INSERT INTO barrios VALUES (556, 10, 'QUIRIGUA', 1, NULL);
INSERT INTO barrios VALUES (557, 10, 'QUIRIGUA II', 1, NULL);
INSERT INTO barrios VALUES (558, 11, 'POTOSI', 1, NULL);
INSERT INTO barrios VALUES (559, 11, 'SANTA ROSA', 1, NULL);
INSERT INTO barrios VALUES (560, 11, 'JULIO FLOREZ', 1, NULL);
INSERT INTO barrios VALUES (561, 11, 'GRANADA NORTE', 1, NULL);
INSERT INTO barrios VALUES (562, 11, 'BRITALIA', 1, NULL);
INSERT INTO barrios VALUES (563, 11, 'CANTAGALLO', 1, NULL);
INSERT INTO barrios VALUES (564, 11, 'VICTORIA NORTE', 1, NULL);
INSERT INTO barrios VALUES (565, 11, 'PRADO PINZON', 1, NULL);
INSERT INTO barrios VALUES (566, 11, 'SAN JOSE DEL PRADO ', 1, NULL);
INSERT INTO barrios VALUES (567, 11, 'PRADO VERANIEGO', 1, NULL);
INSERT INTO barrios VALUES (568, 11, 'CIUDAD JARDIN NORTE', 1, NULL);
INSERT INTO barrios VALUES (569, 11, 'NIZA SUR', 1, NULL);
INSERT INTO barrios VALUES (570, 11, 'MAZUREN', 1, NULL);
INSERT INTO barrios VALUES (571, 11, 'MONACO', 1, NULL);
INSERT INTO barrios VALUES (572, 11, 'NIZA SUBA', 1, NULL);
INSERT INTO barrios VALUES (573, 11, 'SAN JOSE DE BAVARIA', 1, NULL);
INSERT INTO barrios VALUES (574, 11, 'GILMAR', 1, NULL);
INSERT INTO barrios VALUES (575, 11, 'IBERIA', 1, NULL);
INSERT INTO barrios VALUES (576, 11, 'PRADO VERANIEGO NORTE', 1, NULL);
INSERT INTO barrios VALUES (577, 11, 'PRADO VERANIEGO SUR', 1, NULL);
INSERT INTO barrios VALUES (578, 11, 'BATAN', 1, NULL);
INSERT INTO barrios VALUES (580, 11, 'NUEVA ZELANDIA', 1, NULL);
INSERT INTO barrios VALUES (581, 11, 'CLUB DE LOS LAGARTOS', 1, NULL);
INSERT INTO barrios VALUES (582, 11, 'LAS VILLAS', 1, NULL);
INSERT INTO barrios VALUES (583, 11, 'NIZA NORTE', 1, NULL);
INSERT INTO barrios VALUES (584, 11, 'PUENTE LARGO', 1, NULL);
INSERT INTO barrios VALUES (585, 11, 'PASADENA', 1, NULL);
INSERT INTO barrios VALUES (586, 11, 'ESTORIL', 1, NULL);
INSERT INTO barrios VALUES (587, 11, 'ANDES NORTE', 1, NULL);
INSERT INTO barrios VALUES (588, 11, 'EL PLAN', 1, NULL);
INSERT INTO barrios VALUES (589, 11, 'VILLA.DEL PRADO', 1, NULL);
INSERT INTO barrios VALUES (590, 11, 'CANODROMO', 1, NULL);
INSERT INTO barrios VALUES (591, 11, 'SANTA HELENA', 1, NULL);
INSERT INTO barrios VALUES (592, 11, 'ESCUELA DE CARABINEROS', 1, NULL);
INSERT INTO barrios VALUES (593, 11, 'MERAÃ‘DELA', 1, NULL);
INSERT INTO barrios VALUES (594, 11, 'SAN JOSE V SECTOR', 1, NULL);
INSERT INTO barrios VALUES (595, 11, 'PORTALES DEL NORTE', 1, NULL);
INSERT INTO barrios VALUES (596, 11, 'CASABLANCA SUBA URBANO', 1, NULL);
INSERT INTO barrios VALUES (597, 11, 'CASABLANCA SUBA URBANO I', 1, NULL);
INSERT INTO barrios VALUES (598, 11, 'CASABLANCA SUBA URBANO II', 1, NULL);
INSERT INTO barrios VALUES (599, 11, 'NUESTRA SEÃ‘ORA DEL ROSARIO', 1, NULL);
INSERT INTO barrios VALUES (600, 11, 'LA CANDELARIA', 1, NULL);
INSERT INTO barrios VALUES (601, 11, 'CONEJERA', 1, NULL);
INSERT INTO barrios VALUES (602, 11, 'LOS NARANJOS', 1, NULL);
INSERT INTO barrios VALUES (603, 11, 'EL RINCON', 1, NULL);
INSERT INTO barrios VALUES (604, 11, 'PUERTA DEL SOL', 1, NULL);
INSERT INTO barrios VALUES (605, 11, 'EL RINCON NORTE', 1, NULL);
INSERT INTO barrios VALUES (606, 11, 'AURES', 1, NULL);
INSERT INTO barrios VALUES (607, 11, 'AURESII', 1, NULL);
INSERT INTO barrios VALUES (608, 11, 'VILLA ELISA', 1, NULL);
INSERT INTO barrios VALUES (609, 11, 'COSTA AZUL', 1, NULL);
INSERT INTO barrios VALUES (610, 11, 'VILLA MARIA', 1, NULL);
INSERT INTO barrios VALUES (611, 11, 'LAS FLORES', 1, NULL);
INSERT INTO barrios VALUES (612, 11, 'ELPOA', 1, NULL);
INSERT INTO barrios VALUES (613, 11, 'SUBA URBANO', 1, NULL);
INSERT INTO barrios VALUES (614, 11, 'EL PINO', 1, NULL);
INSERT INTO barrios VALUES (615, 11, 'TUNA ALTA', 1, NULL);
INSERT INTO barrios VALUES (616, 11, 'CASABLANCA. SUBA', 1, NULL);
INSERT INTO barrios VALUES (617, 11, 'LA GAITANA ', 1, NULL);
INSERT INTO barrios VALUES (618, 11, 'RINCON DE SANTA INES ', 1, NULL);
INSERT INTO barrios VALUES (619, 11, 'ALMIRANTE COLON', 1, NULL);
INSERT INTO barrios VALUES (620, 11, 'CAMPANEI XA', 1, NULL);
INSERT INTO barrios VALUES (621, 11, 'LAGO DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (622, 11, 'LA CHUCUA', 1, NULL);
INSERT INTO barrios VALUES (623, 11, 'ALTOS DE CHOZICA', 1, NULL);
INSERT INTO barrios VALUES (624, 11, 'TTES DE COLOMBIA', 1, NULL);
INSERT INTO barrios VALUES (625, 11, 'NUEVA TIBABUYES', 1, NULL);
INSERT INTO barrios VALUES (626, 11, 'TIBABUYES UNIVERSAL', 1, NULL);
INSERT INTO barrios VALUES (627, 11, 'SALITRE SUBA I', 1, NULL);
INSERT INTO barrios VALUES (628, 11, 'LECH WALESA', 1, NULL);
INSERT INTO barrios VALUES (629, 11, 'LOMBARDIA', 1, NULL);
INSERT INTO barrios VALUES (630, 11, 'TOSCANA', 1, NULL);
INSERT INTO barrios VALUES (631, 11, 'SAN CAYETAN', 1, NULL);
INSERT INTO barrios VALUES (632, 11, 'SUBA CERROS', 1, NULL);
INSERT INTO barrios VALUES (633, 11, 'SABANA DE TIBABUYES', 1, NULL);
INSERT INTO barrios VALUES (634, 11, 'TIBABUYES', 1, NULL);
INSERT INTO barrios VALUES (635, 11, 'SABANA DE TIBABUYES NORTE', 1, NULL);
INSERT INTO barrios VALUES (636, 11, 'CIUDAD HUNZA', 1, NULL);
INSERT INTO barrios VALUES (637, 11, 'LA CAROLINA DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (638, 11, 'RINCQN DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (639, 11, 'SANTA TERESA DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (640, 11, 'LAS MERCEDES SUBA', 1, NULL);
INSERT INTO barrios VALUES (641, 11, 'POTRERILLO', 1, NULL);
INSERT INTO barrios VALUES (642, 11, 'BOSQUES DE SAN JORGE', 1, NULL);
INSERT INTO barrios VALUES (643, 11, 'TUNA BAJA', 1, NULL);
INSERT INTO barrios VALUES (644, 11, 'LAS MERCEDES I', 1, NULL);
INSERT INTO barrios VALUES (645, 11, 'VILLAHERMOSA', 1, NULL);
INSERT INTO barrios VALUES (646, 11, 'PINOS DE LOMBARDIA', 1, NULL);
INSERT INTO barrios VALUES (647, 11, 'DELMONTE', 1, NULL);
INSERT INTO barrios VALUES (648, 11, 'IRAGUA', 1, NULL);
INSERT INTO barrios VALUES (649, 11, 'TIBABUYES II', 1, NULL);
INSERT INTO barrios VALUES (650, 11, 'VEREDA SUBA NARANJOS', 1, NULL);
INSERT INTO barrios VALUES (651, 11, 'TIBABUYES OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (652, 11, 'SAN CARLOS DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (653, 11, 'BILBAO', 1, NULL);
INSERT INTO barrios VALUES (656, 11, 'SANTA RITA DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (659, 11, 'CASA BLANCA SUBA I', 1, NULL);
INSERT INTO barrios VALUES (660, 11, 'BERLIN', 1, NULL);
INSERT INTO barrios VALUES (661, 11, 'ALTOS DE SUBA', 1, NULL);
INSERT INTO barrios VALUES (662, 11, 'TUNA', 1, NULL);
INSERT INTO barrios VALUES (663, 11, 'LA GAITANA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (664, 11, 'VILLA ALCAZAR', 1, NULL);
INSERT INTO barrios VALUES (665, 11, 'VEREDA SUBA CERROS II', 1, NULL);
INSERT INTO barrios VALUES (666, 11, 'RINCON ALTAMAR', 1, NULL);
INSERT INTO barrios VALUES (667, 12, 'JOSE JOAQUIN VARGAS', 1, NULL);
INSERT INTO barrios VALUES (668, 12, 'POPULAR MODELO', 1, NULL);
INSERT INTO barrios VALUES (669, 12, 'SAN MIGUEL', 1, NULL);
INSERT INTO barrios VALUES (670, 12, 'EL ROSARIO', 1, NULL);
INSERT INTO barrios VALUES (671, 12, 'PARQUE DISTRITAL SALITRE', 1, NULL);
INSERT INTO barrios VALUES (672, 12, 'PARQUE POPULAR SALITRE', 1, NULL);
INSERT INTO barrios VALUES (673, 12, 'JORGE ELIECER GAITAN', 1, NULL);
INSERT INTO barrios VALUES (674, 12, 'DOCE DE OCTUBRE', 1, NULL);
INSERT INTO barrios VALUES (675, 12, 'SAN FERNANDO', 1, NULL);
INSERT INTO barrios VALUES (676, 12, 'SAN FERNANDO OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (677, 12, 'SIMON BOLIVAR', 1, NULL);
INSERT INTO barrios VALUES (678, 12, 'LAUBkRTAD', 1, NULL);
INSERT INTO barrios VALUES (679, 12, 'METROPOLIS', 1, NULL);
INSERT INTO barrios VALUES (680, 12, 'LA CASTELLANA', 1, NULL);
INSERT INTO barrios VALUES (681, 12, 'LA PATRIA ', 1, NULL);
INSERT INTO barrios VALUES (682, 12, 'ENTRERIOS', 1, NULL);
INSERT INTO barrios VALUES (683, 12, 'LOS ANDES', 1, NULL);
INSERT INTO barrios VALUES (684, 12, 'RIONEGRO', 1, NULL);
INSERT INTO barrios VALUES (685, 12, 'ESCUELA MILITAR', 1, NULL);
INSERT INTO barrios VALUES (686, 12, 'LA MERCED NORTE', 1, NULL);
INSERT INTO barrios VALUES (687, 12, 'ALCAZARES', 1, NULL);
INSERT INTO barrios VALUES (688, 12, 'COLOMBIA', 1, NULL);
INSERT INTO barrios VALUES (689, 12, 'CONCEPCION NORTE', 1, NULL);
INSERT INTO barrios VALUES (690, 12, 'LA ESPERANZA', 1, NULL);
INSERT INTO barrios VALUES (691, 12, 'BAQUERO', 1, NULL);
INSERT INTO barrios VALUES (692, 12, 'MUEQUETA', 1, NULL);
INSERT INTO barrios VALUES (693, 12, 'QUINTA MUTIS ', 1, NULL);
INSERT INTO barrios VALUES (694, 12, 'BENJAMIN HERRERA', 1, NULL);
INSERT INTO barrios VALUES (695, 12, 'LA PAZ', 1, NULL);
INSERT INTO barrios VALUES (696, 12, 'SIETE DE AGOSTO', 1, NULL);
INSERT INTO barrios VALUES (697, 12, 'RAFAEL URIBE', 1, NULL);
INSERT INTO barrios VALUES (698, 12, 'POLO CLUB', 1, NULL);
INSERT INTO barrios VALUES (700, 12, 'SAN FELIPE', 1, NULL);
INSERT INTO barrios VALUES (701, 12, 'ALCÃZARES NORTE', 1, NULL);
INSERT INTO barrios VALUES (702, 12, 'ONCE DE NOVIEMBRE', 1, NULL);
INSERT INTO barrios VALUES (703, 12, 'SANTA SOFIA', 1, NULL);
INSERT INTO barrios VALUES (705, 13, 'CAMPlN OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (706, 13, 'NICOLAS DEFEDERMAN', 1, NULL);
INSERT INTO barrios VALUES (707, 13, 'ACEVEDOTEjADA', 1, NULL);
INSERT INTO barrios VALUES (708, 13, 'CIUDAD UNIVERSITARIA', 1, NULL);
INSERT INTO barrios VALUES (709, 13, 'CENTRO ADMINISTRATIVO OCC', 1, NULL);
INSERT INTO barrios VALUES (710, 13, 'EL SALITRE', 1, NULL);
INSERT INTO barrios VALUES (711, 13, 'LA ESMERALDA', 1, NULL);
INSERT INTO barrios VALUES (712, 13, 'PAULO VI', 1, NULL);
INSERT INTO barrios VALUES (713, 13, ',(* EUCARISTICO', 1, NULL);
INSERT INTO barrios VALUES (714, 13, 'PABiD VI NORTE', 1, NULL);
INSERT INTO barrios VALUES (715, 13, '*RM$ELM3MPZ', 1, NULL);
INSERT INTO barrios VALUES (716, 13, 'Hk RECUERDO', 1, NULL);
INSERT INTO barrios VALUES (717, 13, 'GRAN AMERICA', 1, NULL);
INSERT INTO barrios VALUES (718, 13, 'QUINTA PAREDES', 1, NULL);
INSERT INTO barrios VALUES (719, 13, 'CENTRO NARINO', 1, NULL);
INSERT INTO barrios VALUES (720, 13, 'CIUDAD SALITRE NOR-ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (721, 13, 'CIUDAD SALITRE SUR-ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (722, 13, 'LA SOLEDAD', 1, NULL);
INSERT INTO barrios VALUES (723, 13, 'SANTA TERESITA', 1, NULL);
INSERT INTO barrios VALUES (725, 13, 'TEUSAQUILLO', 1, NULL);
INSERT INTO barrios VALUES (726, 13, 'ARMENIA', 1, NULL);
INSERT INTO barrios VALUES (727, 13, 'ESTRELLA', 1, NULL);
INSERT INTO barrios VALUES (728, 13, 'LAS,AMERICAS', 1, NULL);
INSERT INTO barrios VALUES (729, 13, 'CAMPIN', 1, NULL);
INSERT INTO barrios VALUES (730, 13, 'SAN LUIS', 1, NULL);
INSERT INTO barrios VALUES (731, 13, 'CIABINERO OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (732, 13, 'QUESADA', 1, NULL);
INSERT INTO barrios VALUES (733, 13, 'PALERMO', 1, NULL);
INSERT INTO barrios VALUES (734, 13, 'BELALCAZAR', 1, NULL);
INSERT INTO barrios VALUES (735, 13, 'PALERIAS', 1, NULL);
INSERT INTO barrios VALUES (736, 13, 'BANCO CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (737, 13, 'ALFONSO LOPEZ', 1, NULL);
INSERT INTO barrios VALUES (738, 14, 'RICAURTE', 1, NULL);
INSERT INTO barrios VALUES (739, 14, 'LA SABANDA', 1, NULL);
INSERT INTO barrios VALUES (740, 14, 'VOTO NACIONAL', 1, NULL);
INSERT INTO barrios VALUES (741, 14, 'LA ESTANZUELA', 1, NULL);
INSERT INTO barrios VALUES (742, 14, 'EDUARDO SANTOS', 1, NULL);
INSERT INTO barrios VALUES (744, 14, 'SANTA ISABEL SUR', 1, NULL);
INSERT INTO barrios VALUES (745, 14, 'SANTA ISABEL', 1, NULL);
INSERT INTO barrios VALUES (746, 14, 'VERAGUAS', 1, NULL);
INSERT INTO barrios VALUES (747, 14, 'LA PEPITA', 1, NULL);
INSERT INTO barrios VALUES (748, 14, 'ELPftOGRESO', 1, NULL);
INSERT INTO barrios VALUES (749, 14, 'FLORIDA', 1, NULL);
INSERT INTO barrios VALUES (750, 14, 'SANTAFE', 1, NULL);
INSERT INTO barrios VALUES (751, 14, 'LA FAVORITA', 1, NULL);
INSERT INTO barrios VALUES (752, 14, 'SAN VICTORINO', 1, NULL);
INSERT INTO barrios VALUES (753, 14, 'EL LISTON ', 1, NULL);
INSERT INTO barrios VALUES (754, 14, 'PALOQUEMAO', 1, NULL);
INSERT INTO barrios VALUES (755, 14, 'SAMPER MENDOZA', 1, NULL);
INSERT INTO barrios VALUES (756, 14, 'COLSEGUROS', 1, NULL);
INSERT INTO barrios VALUES (757, 14, 'USATAMA', 1, NULL);
INSERT INTO barrios VALUES (758, 15, 'SEVILLA', 1, NULL);
INSERT INTO barrios VALUES (759, 15, 'CIUDAD BERNA', 1, NULL);
INSERT INTO barrios VALUES (760, 15, 'CARACAS', 1, NULL);
INSERT INTO barrios VALUES (761, 15, 'CIUDAD JARDIN SUR', 1, NULL);
INSERT INTO barrios VALUES (762, 15, 'LA HORTUA', 1, NULL);
INSERT INTO barrios VALUES (763, 15, 'FOUCARPA', 1, NULL);
INSERT INTO barrios VALUES (764, 15, 'LA MAGUITA', 1, NULL);
INSERT INTO barrios VALUES (766, 15, 'RESTREPO', 1, NULL);
INSERT INTO barrios VALUES (767, 15, 'RESTREPO OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (768, 15, 'SANTANDER', 1, NULL);
INSERT INTO barrios VALUES (769, 15, 'SENA', 1, NULL);
INSERT INTO barrios VALUES (770, 15, 'LA.FRAGUA', 1, NULL);
INSERT INTO barrios VALUES (771, 15, 'EDUARDO FREY', 1, NULL);
INSERT INTO barrios VALUES (772, 15, 'SANTANDER SUR', 1, NULL);
INSERT INTO barrios VALUES (773, 15, 'VILLAMAYOR ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (774, 16, 'PENSILVANIA', 1, NULL);
INSERT INTO barrios VALUES (776, 16, 'LA ASUNCION', 1, NULL);
INSERT INTO barrios VALUES (777, 16, 'MONTES', 1, NULL);
INSERT INTO barrios VALUES (778, 16, 'PRIMAVERA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (779, 16, 'SAN FRANCISCO', 1, NULL);
INSERT INTO barrios VALUES (780, 16, 'GORGONZOLA', 1, NULL);
INSERT INTO barrios VALUES (781, 16, 'LOS EJIDOS', 1, NULL);
INSERT INTO barrios VALUES (782, 16, 'SANTA MATILDE', 1, NULL);
INSERT INTO barrios VALUES (783, 16, 'JORGE GAITAN CORTES', 1, NULL);
INSERT INTO barrios VALUES (785, 16, 'TIBANA', 1, NULL);
INSERT INTO barrios VALUES (786, 16, 'SAN RAFAEL,INDUSTRIAL', 1, NULL);
INSERT INTO barrios VALUES (787, 16, 'SAN RAFAEL', 1, NULL);
INSERT INTO barrios VALUES (788, 16, 'BARCELONA', 1, NULL);
INSERT INTO barrios VALUES (790, 16, 'LA PRADERA', 1, NULL);
INSERT INTO barrios VALUES (791, 16, 'LA TRINIDAD', 1, NULL);
INSERT INTO barrios VALUES (792, 16, 'SAN GABRIEL', 1, NULL);
INSERT INTO barrios VALUES (793, 16, 'COLON', 1, NULL);
INSERT INTO barrios VALUES (794, 16, 'LA CAMELIA', 1, NULL);
INSERT INTO barrios VALUES (795, 16, 'EROVIVIENDA NORTE', 1, NULL);
INSERT INTO barrios VALUES (796, 16, 'CAMELIA 11', 1, NULL);
INSERT INTO barrios VALUES (797, 16, 'SAN EUSEBIO', 1, NULL);
INSERT INTO barrios VALUES (798, 16, 'REMANSO', 1, NULL);
INSERT INTO barrios VALUES (799, 16, 'AUTOPISTA MUZU', 1, NULL);
INSERT INTO barrios VALUES (800, 16, 'AUTOPISTA SUR', 1, NULL);
INSERT INTO barrios VALUES (801, 16, 'lOSPlNA PEREZ SUR', 1, NULL);
INSERT INTO barrios VALUES (802, 16, 'lOSPlNA PEREZ', 1, NULL);
INSERT INTO barrios VALUES (803, 16, 'ALCALA', 1, NULL);
INSERT INTO barrios VALUES (804, 16, 'TEJAR', 1, NULL);
INSERT INTO barrios VALUES (805, 16, 'ALQUERIA', 1, NULL);
INSERT INTO barrios VALUES (806, 16, 'REMANSO SUR', 1, NULL);
INSERT INTO barrios VALUES (807, 16, 'AUTOPISTA MUZU ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (808, 16, 'CORREDOR FERREO', 1, NULL);
INSERT INTO barrios VALUES (809, 16, 'LA ELORIDA OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (810, 16, 'ESTACION CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (811, 16, 'INDUSTRIAL CENTENARIO', 1, NULL);
INSERT INTO barrios VALUES (812, 16, 'ELEJIDO', 1, NULL);
INSERT INTO barrios VALUES (813, 16, 'BATALLON CALDAS', 1, NULL);
INSERT INTO barrios VALUES (814, 16, 'ORTEZAL', 1, NULL);
INSERT INTO barrios VALUES (815, 16, 'CUNDINAMARCA', 1, NULL);
INSERT INTO barrios VALUES (816, 16, 'SALADAR GOMEZ', 1, NULL);
INSERT INTO barrios VALUES (817, 16, 'PUENTE ARANDA', 1, NULL);
INSERT INTO barrios VALUES (818, 16, 'CENTRO INDUSTRIAL', 1, NULL);
INSERT INTO barrios VALUES (819, 17, 'LAS AGUAS', 1, NULL);
INSERT INTO barrios VALUES (820, 17, 'LA CONCORDIA .', 1, NULL);
INSERT INTO barrios VALUES (821, 17, 'EGIPTO', 1, NULL);
INSERT INTO barrios VALUES (822, 17, 'CENTRÃ“ ADMINISTRATIVO', 1, NULL);
INSERT INTO barrios VALUES (823, 17, 'LA CATEDRAL', 1, NULL);
INSERT INTO barrios VALUES (824, 17, 'SANTABARBARA', 1, NULL);
INSERT INTO barrios VALUES (825, 17, 'BELEN', 1, NULL);
INSERT INTO barrios VALUES (826, 18, 'SAN JOSE SUR', 1, NULL);
INSERT INTO barrios VALUES (827, 18, 'GUSTAVO RESTREPO', 1, NULL);
INSERT INTO barrios VALUES (828, 18, 'HOSPITAL SAN CARLOS', 1, NULL);
INSERT INTO barrios VALUES (829, 18, 'SOSIEGO SUR', 1, NULL);
INSERT INTO barrios VALUES (830, 18, 'MARCO FIDEL SUAREZ', 1, NULL);
INSERT INTO barrios VALUES (831, 18, 'SAN JORGE SUR', 1, NULL);
INSERT INTO barrios VALUES (832, 18, 'GRANJAS SAN PABLO', 1, NULL);
INSERT INTO barrios VALUES (833, 18, 'LA RESURRECCION', 1, NULL);
INSERT INTO barrios VALUES (834, 18, 'MOLINOS DEL SUR', 1, NULL);
INSERT INTO barrios VALUES (835, 18, 'MARCO FIDEL SUAREZ I', 1, NULL);
INSERT INTO barrios VALUES (836, 18, 'SAN AGUSTIN', 1, NULL);
INSERT INTO barrios VALUES (837, 18, 'LOS MOLINOS', 1, NULL);
INSERT INTO barrios VALUES (838, 18, 'MARRUECOS', 1, NULL);
INSERT INTO barrios VALUES (839, 18, 'CALLEJON SANTA BARBARA .', 1, NULL);
INSERT INTO barrios VALUES (840, 18, 'ELPLAYON', 1, NULL);
INSERT INTO barrios VALUES (841, 18, 'DIANA TURBAY', 1, NULL);
INSERT INTO barrios VALUES (842, 18, 'DIANA. TURBAY ARRAYANES', 1, NULL);
INSERT INTO barrios VALUES (843, 18, 'ARBOLEDA SUR', 1, NULL);
INSERT INTO barrios VALUES (844, 18, 'GRANJAS DE SANTA SOFIA ', 1, NULL);
INSERT INTO barrios VALUES (846, 18, 'PUERTO RICO ', 1, NULL);
INSERT INTO barrios VALUES (847, 18, 'CERROS DE ORIENTE', 1, NULL);
INSERT INTO barrios VALUES (848, 18, 'GUIPARIA', 1, NULL);
INSERT INTO barrios VALUES (849, 18, 'LA RESURRECCION I', 1, NULL);
INSERT INTO barrios VALUES (850, 18, 'DIANA TURBAY CULTIVOS', 1, NULL);
INSERT INTO barrios VALUES (851, 18, 'CARMEN DEL SOL', 1, NULL);
INSERT INTO barrios VALUES (852, 18, 'LOS ARRAYANES II', 1, NULL);
INSERT INTO barrios VALUES (853, 18, 'OLAYA', 1, NULL);
INSERT INTO barrios VALUES (854, 18, 'QUIROGA', 1, NULL);
INSERT INTO barrios VALUES (855, 18, 'QUIROGA CENTRAL', 1, NULL);
INSERT INTO barrios VALUES (856, 18, 'QUIROGA SUR,', 1, NULL);
INSERT INTO barrios VALUES (857, 18, 'SANTA LUCIA', 1, NULL);
INSERT INTO barrios VALUES (858, 18, 'QUIROGA I', 1, NULL);
INSERT INTO barrios VALUES (859, 18, 'CENTENARIO', 1, NULL);
INSERT INTO barrios VALUES (860, 18, 'SANTIAGO PEREZ', 1, NULL);
INSERT INTO barrios VALUES (861, 18, 'LIBERTADOR', 1, NULL);
INSERT INTO barrios VALUES (862, 18, 'BRAVO PAEZ', 1, NULL);
INSERT INTO barrios VALUES (863, 18, 'INGLES', 1, NULL);
INSERT INTO barrios VALUES (864, 18, 'CLARET', 1, NULL);
INSERT INTO barrios VALUES (865, 18, 'MURILLO TORO', 1, NULL);
INSERT INTO barrios VALUES (866, 18, 'VILLAMAYOR', 1, NULL);
INSERT INTO barrios VALUES (867, 18, 'LA PICOTA ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (868, 18, 'LA PICOTA,', 1, NULL);
INSERT INTO barrios VALUES (869, 18, 'PALERMO SUR', 1, NULL);
INSERT INTO barrios VALUES (871, 18, 'ARRAYANES VI', 1, NULL);
INSERT INTO barrios VALUES (872, 19, 'VERONA', 1, NULL);
INSERT INTO barrios VALUES (873, 19, 'ISMAEL PERDOMO ', 1, NULL);
INSERT INTO barrios VALUES (874, 19, 'MAPPLENA .', 1, NULL);
INSERT INTO barrios VALUES (875, 19, 'EL ENSUENO', 1, NULL);
INSERT INTO barrios VALUES (876, 19, 'BARLOVENTO', 1, NULL);
INSERT INTO barrios VALUES (877, 19, 'LA ESTANCIA', 1, NULL);
INSERT INTO barrios VALUES (878, 19, 'RINC.QN DELA VALVANERA', 1, NULL);
INSERT INTO barrios VALUES (879, 19, 'LA CORUNA', 1, NULL);
INSERT INTO barrios VALUES (880, 19, 'RAFAEL ESCAMILLA', 1, NULL);
INSERT INTO barrios VALUES (881, 19, 'ATLANTA ', 1, NULL);
INSERT INTO barrios VALUES (882, 19, 'ESPINO', 1, NULL);
INSERT INTO barrios VALUES (883, 19, 'RESÃJCON DE GALICIA', 1, NULL);
INSERT INTO barrios VALUES (884, 19, 'SANTO DOMINGO', 1, NULL);
INSERT INTO barrios VALUES (885, 19, 'GALICIA', 1, NULL);
INSERT INTO barrios VALUES (886, 19, 'PRIMAVERA II', 1, NULL);
INSERT INTO barrios VALUES (887, 19, 'MARIA CANO', 1, NULL);
INSERT INTO barrios VALUES (890, 19, 'ARBORIZADORA BAJA', 1, NULL);
INSERT INTO barrios VALUES (891, 19, 'EL PENON DEL CORTIJO', 1, NULL);
INSERT INTO barrios VALUES (892, 19, 'JERUSALE', 1, NULL);
INSERT INTO barrios VALUES (893, 19, 'EL CHIRCAL SUR', 1, NULL);
INSERT INTO barrios VALUES (894, 19, 'BELLA VISTA', 1, NULL);
INSERT INTO barrios VALUES (899, 19, 'LOS TRES REYES', 1, NULL);
INSERT INTO barrios VALUES (900, 19, 'SANTA VIVIANA', 1, NULL);
INSERT INTO barrios VALUES (901, 19, 'LA PRIMAVERA I', 1, NULL);
INSERT INTO barrios VALUES (902, 19, 'SIERRA MORENA II', 1, NULL);
INSERT INTO barrios VALUES (903, 19, 'CARACOLI', 1, NULL);
INSERT INTO barrios VALUES (905, 19, 'EL MIRADOR DE LA ESTANCIA ', 1, NULL);
INSERT INTO barrios VALUES (906, 19, 'PERDOMOALTO', 1, NULL);
INSERT INTO barrios VALUES (908, 19, 'PERDOMO ALTO', 1, NULL);
INSERT INTO barrios VALUES (909, 19, 'SAN ANTONIO DEL MIRADOR', 1, NULL);
INSERT INTO barrios VALUES (910, 19, 'CIUDAD BOLIVAR', 1, NULL);
INSERT INTO barrios VALUES (911, 19, 'LA VALVANERA', 1, NULL);
INSERT INTO barrios VALUES (912, 19, 'QUIBA I', 1, NULL);
INSERT INTO barrios VALUES (913, 19, 'ARBORlZADORA ALTA I', 1, NULL);
INSERT INTO barrios VALUES (914, 19, 'ARBORlZADORA ALTA II', 1, NULL);
INSERT INTO barrios VALUES (915, 19, 'MELLAD', 1, NULL);
INSERT INTO barrios VALUES (916, 19, 'COMPARTIR', 1, NULL);
INSERT INTO barrios VALUES (918, 19, 'MEISSEN ', 1, NULL);
INSERT INTO barrios VALUES (920, 19, 'MÃ‰XICO', 1, NULL);
INSERT INTO barrios VALUES (921, 19, 'LUCERO DEL SUR', 1, NULL);
INSERT INTO barrios VALUES (922, 19, 'RONDA', 1, NULL);
INSERT INTO barrios VALUES (923, 19, 'LAS MANAS', 1, NULL);
INSERT INTO barrios VALUES (924, 19, 'LUCERO ALTO', 1, NULL);
INSERT INTO barrios VALUES (925, 19, 'EL MOCHUELO ORIENTAL', 1, NULL);
INSERT INTO barrios VALUES (927, 19, 'QUIBA', 1, NULL);
INSERT INTO barrios VALUES (928, 19, 'CANDELARIA NUEVA', 1, NULL);
INSERT INTO barrios VALUES (929, 19, 'QUINTAS DEL SUR', 1, NULL);
INSERT INTO barrios VALUES (930, 19, 'SOTAVENTO', 1, NULL);
INSERT INTO barrios VALUES (931, 19, 'CASA DE TEJA', 1, NULL);
INSERT INTO barrios VALUES (933, 19, 'ESTRELLA DEL SUR', 1, NULL);
INSERT INTO barrios VALUES (934, 19, 'LOS LAURELES II', 1, NULL);
INSERT INTO barrios VALUES (935, 19, 'ELSATELITE', 1, NULL);
INSERT INTO barrios VALUES (936, 19, 'NACIONES UNIDAS', 1, NULL);
INSERT INTO barrios VALUES (937, 19, 'EL TESORO', 1, NULL);
INSERT INTO barrios VALUES (938, 19, 'VILLA GLORIA', 1, NULL);
INSERT INTO barrios VALUES (939, 19, 'JUAN PABLO II', 1, NULL);
INSERT INTO barrios VALUES (940, 19, 'SUMAPAZ', 1, NULL);
INSERT INTO barrios VALUES (941, 19, 'GIBRALTAR SUR', 1, NULL);
INSERT INTO barrios VALUES (942, 19, 'JUAN JOSE RONDON', 1, NULL);
INSERT INTO barrios VALUES (943, 19, 'PIAMANTE', 1, NULL);
INSERT INTO barrios VALUES (944, 19, 'LOS ALPES SUR', 1, NULL);
INSERT INTO barrios VALUES (946, 19, 'VILLAS EL DIAMANTE', 1, NULL);
INSERT INTO barrios VALUES (947, 19, 'CENTRAL DE MEZCLAS', 1, NULL);
INSERT INTO barrios VALUES (948, 19, 'EL MINUTO DE MARIA', 1, NULL);
INSERT INTO barrios VALUES (949, 19, 'PARAISO QUIBA', 1, NULL);
INSERT INTO barrios VALUES (952, 19, 'ELMIRADPR', 1, NULL);
INSERT INTO barrios VALUES (954, 19, 'CEDRITOS DEL SUR', 1, NULL);
INSERT INTO barrios VALUES (955, 19, 'CERRO COLORADO', 1, NULL);
INSERT INTO barrios VALUES (956, 19, 'ARABIA', 1, NULL);
INSERT INTO barrios VALUES (957, 19, 'VILLA CANDELARIA', 1, NULL);
INSERT INTO barrios VALUES (958, 19, 'BELLA FLOR', 1, NULL);
INSERT INTO barrios VALUES (959, 19, 'LA TORRE', 1, NULL);
INSERT INTO barrios VALUES (960, 19, 'BELLA FLOR SUR', 1, NULL);
INSERT INTO barrios VALUES (961, 19, 'QUIBA URBANO', 1, NULL);
INSERT INTO barrios VALUES (962, 19, 'EL MOCHUELO', 1, NULL);
INSERT INTO barrios VALUES (963, 19, 'EL MOCHUELO URBANO', 1, NULL);
INSERT INTO barrios VALUES (964, 19, 'BRISAS DEL VOLADOR', 1, NULL);
INSERT INTO barrios VALUES (965, 19, 'EL MOCHUELO III URBANO', 1, NULL);
INSERT INTO barrios VALUES (966, 19, 'BRAZUELOS OCCIDENTAL', 1, NULL);
INSERT INTO barrios VALUES (967, 19, 'LAGUNITAS URBANO', 1, NULL);
INSERT INTO barrios VALUES (968, 19, 'MOCHUELO ALTO', 1, NULL);
INSERT INTO barrios VALUES (969, 19, 'EL MOCHUELO II URBANO', 1, NULL);
INSERT INTO barrios VALUES (970, 19, 'GUADALUPE', 1, NULL);


--
-- Data for Name: beneficiarios; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: bodegas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO bodegas VALUES (18, 'BODEGA PRINCIPAL', 'kr 55 41 - 24 sur', 35, NULL, NULL, NULL, 7701001009001);
INSERT INTO bodegas VALUES (23, 'BODEGA CENTRO', 'cll 26 # 37b  - 92', 44, NULL, NULL, 3242351, 7701001009100);
INSERT INTO bodegas VALUES (25, 'ALMACEN HORTUA', 'Cra 12 # 1 - 65 sur', 35, 'ALALALALALALA', NULL, 234234234, 7701001067844);


--
-- Data for Name: bodegasproductos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO bodegasproductos VALUES (36477, 18, 3104, 0, NULL, NULL, 0, 2560);
INSERT INTO bodegasproductos VALUES (36478, 23, 3104, 0, NULL, NULL, 0, 2560);
INSERT INTO bodegasproductos VALUES (36479, 25, 3104, 0, NULL, NULL, 0, 2560);
INSERT INTO bodegasproductos VALUES (36483, 18, 3106, 0, NULL, NULL, 0, 5678);
INSERT INTO bodegasproductos VALUES (36484, 23, 3106, 0, NULL, NULL, 0, 5678);
INSERT INTO bodegasproductos VALUES (36485, 25, 3106, 0, NULL, NULL, 0, 5678);
INSERT INTO bodegasproductos VALUES (36486, 18, 3107, 0, NULL, NULL, 0, 5700);
INSERT INTO bodegasproductos VALUES (36487, 23, 3107, 0, NULL, NULL, 0, 5700);
INSERT INTO bodegasproductos VALUES (36488, 25, 3107, 0, NULL, NULL, 0, 5700);
INSERT INTO bodegasproductos VALUES (36492, 18, 3108, 0, NULL, NULL, 0, 500000);
INSERT INTO bodegasproductos VALUES (36493, 23, 3108, 0, NULL, NULL, 0, 500000);
INSERT INTO bodegasproductos VALUES (36494, 25, 3108, 0, NULL, NULL, 0, 500000);
INSERT INTO bodegasproductos VALUES (36495, 18, 3109, 0, NULL, NULL, 0, 0);
INSERT INTO bodegasproductos VALUES (36496, 23, 3109, 0, NULL, NULL, 0, 0);
INSERT INTO bodegasproductos VALUES (36497, 25, 3109, 0, NULL, NULL, 0, 0);


--
-- Data for Name: categoriasp; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO categoriasp VALUES (44, 'PROMOCIONES');
INSERT INTO categoriasp VALUES (45, 'PANELAS');
INSERT INTO categoriasp VALUES (43, 'FRUTAS TROPICALES');


--
-- Data for Name: ciudades; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ciudades VALUES (3, 1, 'La Chorrera (CD)', 91405);
INSERT INTO ciudades VALUES (4, 1, 'La Pedrera (CD)', 91407);
INSERT INTO ciudades VALUES (5, 1, 'La Victoria (CD)', 91430);
INSERT INTO ciudades VALUES (6, 1, 'Leticia', 91001);
INSERT INTO ciudades VALUES (7, 1, 'Miriti Parana (CD)', 91460);
INSERT INTO ciudades VALUES (8, 1, 'Puerto Alegria (CD)', 91530);
INSERT INTO ciudades VALUES (9, 1, 'Puerto Arica (CD)', 91536);
INSERT INTO ciudades VALUES (10, 1, 'Puerto NariÃ±o', 91540);
INSERT INTO ciudades VALUES (11, 1, 'Puerto Santander (CD)', 91669);
INSERT INTO ciudades VALUES (12, 1, 'Tarapaca (CD)', 91798);
INSERT INTO ciudades VALUES (14, 2, 'Abejorral', 5002);
INSERT INTO ciudades VALUES (15, 2, 'Abriaqui', 5004);
INSERT INTO ciudades VALUES (16, 2, 'Alejandria', 5021);
INSERT INTO ciudades VALUES (1, 1, 'Amazonas', 91000);
INSERT INTO ciudades VALUES (13, 2, 'Antioquia', 5000);
INSERT INTO ciudades VALUES (17, 2, 'Amaga', 5030);
INSERT INTO ciudades VALUES (18, 2, 'Amalfi', 5031);
INSERT INTO ciudades VALUES (19, 2, 'Andes', 5034);
INSERT INTO ciudades VALUES (20, 2, 'Angelopolis', 5036);
INSERT INTO ciudades VALUES (21, 2, 'Angostura', 5038);
INSERT INTO ciudades VALUES (22, 2, 'Anori', 5040);
INSERT INTO ciudades VALUES (23, 2, 'Antioquia', 5042);
INSERT INTO ciudades VALUES (24, 2, 'Anza', 5044);
INSERT INTO ciudades VALUES (25, 2, 'Apartado', 5045);
INSERT INTO ciudades VALUES (26, 2, 'Arboletes', 5051);
INSERT INTO ciudades VALUES (27, 2, 'Argelia', 5055);
INSERT INTO ciudades VALUES (28, 2, 'Armenia', 5059);
INSERT INTO ciudades VALUES (29, 2, 'Barbosa', 5079);
INSERT INTO ciudades VALUES (30, 2, 'Bello', 5088);
INSERT INTO ciudades VALUES (31, 2, 'Belmira', 5086);
INSERT INTO ciudades VALUES (32, 2, 'Betania', 5091);
INSERT INTO ciudades VALUES (33, 2, 'Betulia', 5093);
INSERT INTO ciudades VALUES (34, 2, 'Bolivar', 5101);
INSERT INTO ciudades VALUES (35, 2, 'Briceno', 5107);
INSERT INTO ciudades VALUES (36, 2, 'Buritica', 5113);
INSERT INTO ciudades VALUES (37, 2, 'Caceres', 5120);
INSERT INTO ciudades VALUES (38, 2, 'Caicedo', 5125);
INSERT INTO ciudades VALUES (39, 2, 'Caldas', 5129);
INSERT INTO ciudades VALUES (40, 2, 'Campamento', 5134);
INSERT INTO ciudades VALUES (41, 2, 'CaÃ±asgordas', 5138);
INSERT INTO ciudades VALUES (42, 2, 'Caracoli', 5142);
INSERT INTO ciudades VALUES (43, 2, 'Caramanta', 5145);
INSERT INTO ciudades VALUES (44, 2, 'Carepa', 5147);
INSERT INTO ciudades VALUES (45, 2, 'Carmen de Viboral', 5148);
INSERT INTO ciudades VALUES (46, 2, 'Carolina', 5150);
INSERT INTO ciudades VALUES (47, 2, 'Caucasia', 5154);
INSERT INTO ciudades VALUES (48, 2, 'Chigorodo', 5172);
INSERT INTO ciudades VALUES (49, 2, 'Cisneros', 5190);
INSERT INTO ciudades VALUES (50, 2, 'Cocorna', 5197);
INSERT INTO ciudades VALUES (51, 2, 'Concepcion', 5206);
INSERT INTO ciudades VALUES (52, 2, 'Concordia', 5209);
INSERT INTO ciudades VALUES (53, 2, 'Copacabana', 5212);
INSERT INTO ciudades VALUES (54, 2, 'Dabeiba', 5234);
INSERT INTO ciudades VALUES (55, 2, 'Don Matias', 5237);
INSERT INTO ciudades VALUES (56, 2, 'Ebejico', 5240);
INSERT INTO ciudades VALUES (57, 2, 'El Bagre', 5250);
INSERT INTO ciudades VALUES (58, 2, 'Entrerrios', 5264);
INSERT INTO ciudades VALUES (59, 2, 'Envigado', 5266);
INSERT INTO ciudades VALUES (60, 2, 'Fredonia', 5282);
INSERT INTO ciudades VALUES (61, 2, 'Frontino', 5284);
INSERT INTO ciudades VALUES (62, 2, 'Giraldo', 5306);
INSERT INTO ciudades VALUES (63, 2, 'Girardota', 5308);
INSERT INTO ciudades VALUES (64, 2, 'Gomez Plata', 5310);
INSERT INTO ciudades VALUES (65, 2, 'Granada', 5313);
INSERT INTO ciudades VALUES (66, 2, 'Guadalupe', 5315);
INSERT INTO ciudades VALUES (67, 2, 'Guarne', 5318);
INSERT INTO ciudades VALUES (68, 2, 'Guatape', 5321);
INSERT INTO ciudades VALUES (69, 2, 'Heliconia', 5347);
INSERT INTO ciudades VALUES (70, 2, 'Hispania', 5353);
INSERT INTO ciudades VALUES (71, 2, 'Itagui', 5360);
INSERT INTO ciudades VALUES (72, 2, 'Ituango', 5361);
INSERT INTO ciudades VALUES (73, 2, 'Jardin', 5364);
INSERT INTO ciudades VALUES (74, 2, 'Jerico', 5368);
INSERT INTO ciudades VALUES (75, 2, 'La Ceja', 5376);
INSERT INTO ciudades VALUES (76, 2, 'La Estrella', 5380);
INSERT INTO ciudades VALUES (77, 2, 'La Pintada', 5390);
INSERT INTO ciudades VALUES (78, 2, 'La Union', 5400);
INSERT INTO ciudades VALUES (79, 2, 'Liborina', 5411);
INSERT INTO ciudades VALUES (80, 2, 'Maceo', 5425);
INSERT INTO ciudades VALUES (81, 2, 'Marinilla', 5440);
INSERT INTO ciudades VALUES (82, 2, 'Medellin', 5001);
INSERT INTO ciudades VALUES (83, 2, 'Montebello', 5467);
INSERT INTO ciudades VALUES (84, 2, 'Murindo', 5475);
INSERT INTO ciudades VALUES (85, 2, 'Mutata', 5480);
INSERT INTO ciudades VALUES (86, 2, 'NariÃ±o', 5483);
INSERT INTO ciudades VALUES (87, 2, 'Nechi', 5495);
INSERT INTO ciudades VALUES (88, 2, 'Necocli', 5490);
INSERT INTO ciudades VALUES (89, 2, 'Olaya', 5501);
INSERT INTO ciudades VALUES (90, 2, 'PeÃ±ol', 5541);
INSERT INTO ciudades VALUES (91, 2, 'Peque', 5543);
INSERT INTO ciudades VALUES (92, 2, 'Pueblorrico', 5576);
INSERT INTO ciudades VALUES (93, 2, 'Puerto Berrio', 5579);
INSERT INTO ciudades VALUES (94, 2, 'Puerto Nare (La Magdalena )', 5585);
INSERT INTO ciudades VALUES (95, 2, 'Puerto Triunfo', 5591);
INSERT INTO ciudades VALUES (96, 2, 'Remedios', 5604);
INSERT INTO ciudades VALUES (97, 2, 'Retiro', 5607);
INSERT INTO ciudades VALUES (98, 2, 'Rionegro', 5615);
INSERT INTO ciudades VALUES (99, 2, 'Sabanalarga', 5628);
INSERT INTO ciudades VALUES (100, 2, 'Sabaneta', 5631);
INSERT INTO ciudades VALUES (101, 2, 'Salgar', 5642);
INSERT INTO ciudades VALUES (102, 2, 'San Andres', 5647);
INSERT INTO ciudades VALUES (103, 2, 'San Carlos', 5649);
INSERT INTO ciudades VALUES (104, 2, 'San Francisco', 5652);
INSERT INTO ciudades VALUES (105, 2, 'San Jeronimo', 5656);
INSERT INTO ciudades VALUES (106, 2, 'San Jose de la Montana', 5658);
INSERT INTO ciudades VALUES (107, 2, 'San Juan de Uraba', 5659);
INSERT INTO ciudades VALUES (108, 2, 'San Luis', 5660);
INSERT INTO ciudades VALUES (109, 2, 'San Pedro', 5664);
INSERT INTO ciudades VALUES (110, 2, 'San Pedro de Uraba', 5665);
INSERT INTO ciudades VALUES (111, 2, 'San Rafael', 5667);
INSERT INTO ciudades VALUES (112, 2, 'San Roque', 5670);
INSERT INTO ciudades VALUES (113, 2, 'San Vicente', 5674);
INSERT INTO ciudades VALUES (114, 2, 'Santa Barbara', 5679);
INSERT INTO ciudades VALUES (115, 2, 'Santa Rosa de Osos', 5686);
INSERT INTO ciudades VALUES (116, 2, 'Santo Domingo', 5690);
INSERT INTO ciudades VALUES (117, 2, 'Santuario', 5697);
INSERT INTO ciudades VALUES (118, 2, 'Segovia', 5736);
INSERT INTO ciudades VALUES (119, 2, 'Sonson', 5756);
INSERT INTO ciudades VALUES (120, 2, 'Sopetran', 5761);
INSERT INTO ciudades VALUES (121, 2, 'Tamesis', 5789);
INSERT INTO ciudades VALUES (122, 2, 'Taraza', 5790);
INSERT INTO ciudades VALUES (123, 2, 'Tarso', 5792);
INSERT INTO ciudades VALUES (124, 2, 'Titiribi', 5809);
INSERT INTO ciudades VALUES (125, 2, 'Toledo', 5819);
INSERT INTO ciudades VALUES (126, 2, 'Turbo', 5837);
INSERT INTO ciudades VALUES (127, 2, 'Uramita', 5842);
INSERT INTO ciudades VALUES (128, 2, 'Urrao', 5847);
INSERT INTO ciudades VALUES (129, 2, 'Valdivia', 5854);
INSERT INTO ciudades VALUES (130, 2, 'Valparaiso', 5856);
INSERT INTO ciudades VALUES (131, 2, 'Vegachi', 5858);
INSERT INTO ciudades VALUES (132, 2, 'Venecia', 5861);
INSERT INTO ciudades VALUES (133, 2, 'Vigia del Fuerte', 5873);
INSERT INTO ciudades VALUES (134, 2, 'Yali', 5885);
INSERT INTO ciudades VALUES (135, 2, 'Yarumal', 5887);
INSERT INTO ciudades VALUES (136, 2, 'Yolombo', 5890);
INSERT INTO ciudades VALUES (137, 2, 'Yondo (Casabe)', 5893);
INSERT INTO ciudades VALUES (138, 2, 'Zaragoza', 5895);
INSERT INTO ciudades VALUES (140, 3, 'Arauca', 81001);
INSERT INTO ciudades VALUES (141, 3, 'Arauquita', 81065);
INSERT INTO ciudades VALUES (142, 3, 'Cravo Norte', 81220);
INSERT INTO ciudades VALUES (143, 3, 'Fortul', 81300);
INSERT INTO ciudades VALUES (144, 3, 'Puerto Rondon', 81591);
INSERT INTO ciudades VALUES (145, 3, 'Saravena', 81736);
INSERT INTO ciudades VALUES (146, 3, 'Tame', 81794);
INSERT INTO ciudades VALUES (148, 4, 'Baranoa', 8078);
INSERT INTO ciudades VALUES (149, 4, 'Campo de la Cruz', 8137);
INSERT INTO ciudades VALUES (150, 4, 'Candelaria', 8141);
INSERT INTO ciudades VALUES (151, 4, 'Galapa', 8296);
INSERT INTO ciudades VALUES (152, 4, 'Juan de Acosta', 8372);
INSERT INTO ciudades VALUES (153, 4, 'Luruaco', 8421);
INSERT INTO ciudades VALUES (154, 4, 'Malambo', 8433);
INSERT INTO ciudades VALUES (155, 4, 'Manati', 8436);
INSERT INTO ciudades VALUES (156, 4, 'Palmar de Varela', 8520);
INSERT INTO ciudades VALUES (157, 4, 'Piojo', 8549);
INSERT INTO ciudades VALUES (158, 4, 'Polo Nuevo', 8558);
INSERT INTO ciudades VALUES (159, 4, 'Ponedera', 8560);
INSERT INTO ciudades VALUES (160, 4, 'Puerto Colombia', 8573);
INSERT INTO ciudades VALUES (161, 4, 'Repelon', 8606);
INSERT INTO ciudades VALUES (162, 4, 'Sabanagrande', 8634);
INSERT INTO ciudades VALUES (163, 4, 'Sabanalarga', 8638);
INSERT INTO ciudades VALUES (164, 4, 'Santa Lucia', 8675);
INSERT INTO ciudades VALUES (147, 4, 'Atlantico. Mpio. Desconocido', 8000);
INSERT INTO ciudades VALUES (165, 4, 'Santo Tomas', 8685);
INSERT INTO ciudades VALUES (166, 4, 'Soledad', 8758);
INSERT INTO ciudades VALUES (167, 4, 'Suan', 8770);
INSERT INTO ciudades VALUES (168, 4, 'Tubara', 8832);
INSERT INTO ciudades VALUES (169, 4, 'Usiacuri', 8849);
INSERT INTO ciudades VALUES (170, 5, 'Barranquilla', 9001);
INSERT INTO ciudades VALUES (171, 6, 'Bogota', 11001);
INSERT INTO ciudades VALUES (173, 7, 'Achi', 13006);
INSERT INTO ciudades VALUES (174, 7, 'Altos del Rosario', 13030);
INSERT INTO ciudades VALUES (175, 7, 'Arenal', 13042);
INSERT INTO ciudades VALUES (176, 7, 'Arjona', 13052);
INSERT INTO ciudades VALUES (177, 7, 'Arroyohondo', 13062);
INSERT INTO ciudades VALUES (178, 7, 'Barranco de Loba', 13074);
INSERT INTO ciudades VALUES (179, 7, 'Calamar', 13140);
INSERT INTO ciudades VALUES (180, 7, 'Cantagallo', 13160);
INSERT INTO ciudades VALUES (181, 7, 'Cicuco', 13188);
INSERT INTO ciudades VALUES (182, 7, 'Clemencia', 13222);
INSERT INTO ciudades VALUES (183, 7, 'Cordoba', 13212);
INSERT INTO ciudades VALUES (184, 7, 'El Carmen de Bolivar', 13244);
INSERT INTO ciudades VALUES (185, 7, 'El Guamo', 13248);
INSERT INTO ciudades VALUES (186, 7, 'El PeÃ±on', 13268);
INSERT INTO ciudades VALUES (187, 7, 'Hatillo de Loba', 13300);
INSERT INTO ciudades VALUES (188, 7, 'Magangue', 13430);
INSERT INTO ciudades VALUES (189, 7, 'Mahates', 13433);
INSERT INTO ciudades VALUES (190, 7, 'Margarita', 13440);
INSERT INTO ciudades VALUES (191, 7, 'Maria La Baja', 13442);
INSERT INTO ciudades VALUES (192, 7, 'Mompos', 13468);
INSERT INTO ciudades VALUES (193, 7, 'Montecristo', 13458);
INSERT INTO ciudades VALUES (194, 7, 'Morales', 13473);
INSERT INTO ciudades VALUES (195, 7, 'Pinillos', 13549);
INSERT INTO ciudades VALUES (196, 7, 'Regidor', 13580);
INSERT INTO ciudades VALUES (197, 7, 'Rio Viejo', 13600);
INSERT INTO ciudades VALUES (198, 7, 'San Cristobal', 13620);
INSERT INTO ciudades VALUES (199, 7, 'San Estanislao', 13647);
INSERT INTO ciudades VALUES (200, 7, 'San Fernando', 13650);
INSERT INTO ciudades VALUES (201, 7, 'San Jacinto', 13654);
INSERT INTO ciudades VALUES (202, 7, 'San Jacinto del Cauca', 13655);
INSERT INTO ciudades VALUES (203, 7, 'San Juan Nepomuceno', 13657);
INSERT INTO ciudades VALUES (204, 7, 'San Martin de Loba', 13667);
INSERT INTO ciudades VALUES (205, 7, 'San Pablo', 13670);
INSERT INTO ciudades VALUES (206, 7, 'Santa Catalina', 13673);
INSERT INTO ciudades VALUES (207, 7, 'Santa Rosa', 13683);
INSERT INTO ciudades VALUES (208, 7, 'Santa Rosa del Sur', 13688);
INSERT INTO ciudades VALUES (209, 7, 'Simiti', 13744);
INSERT INTO ciudades VALUES (210, 7, 'Soplaviento', 13760);
INSERT INTO ciudades VALUES (211, 7, 'Talaigua NUevo', 13780);
INSERT INTO ciudades VALUES (212, 7, 'Tiquisio (Puerto Rico)', 13810);
INSERT INTO ciudades VALUES (213, 7, 'Turbaco', 13836);
INSERT INTO ciudades VALUES (214, 7, 'Turbana', 13838);
INSERT INTO ciudades VALUES (215, 7, 'Villanueva', 13873);
INSERT INTO ciudades VALUES (216, 7, 'Zambrano', 13894);
INSERT INTO ciudades VALUES (218, 8, 'Almeida', 15022);
INSERT INTO ciudades VALUES (219, 8, 'Aquitania', 15047);
INSERT INTO ciudades VALUES (220, 8, 'Arcabuco', 15051);
INSERT INTO ciudades VALUES (221, 8, 'Belen', 15087);
INSERT INTO ciudades VALUES (222, 8, 'Berbeo', 15090);
INSERT INTO ciudades VALUES (223, 8, 'Beteitiva', 15092);
INSERT INTO ciudades VALUES (224, 8, 'Boavita', 15097);
INSERT INTO ciudades VALUES (225, 8, 'Boyaca', 15104);
INSERT INTO ciudades VALUES (226, 8, 'Briceno', 15106);
INSERT INTO ciudades VALUES (227, 8, 'Buenavista', 15109);
INSERT INTO ciudades VALUES (228, 8, 'Busbanza', 15114);
INSERT INTO ciudades VALUES (229, 8, 'Caldas', 15131);
INSERT INTO ciudades VALUES (230, 8, 'Campohermoso', 15135);
INSERT INTO ciudades VALUES (231, 8, 'Cerinza', 15162);
INSERT INTO ciudades VALUES (232, 8, 'Chinavita', 15172);
INSERT INTO ciudades VALUES (233, 8, 'Chiquinquira', 15176);
INSERT INTO ciudades VALUES (234, 8, 'Chiquiza', 15232);
INSERT INTO ciudades VALUES (235, 8, 'Chiscas', 15180);
INSERT INTO ciudades VALUES (236, 8, 'Chita', 15183);
INSERT INTO ciudades VALUES (237, 8, 'Chitaraque', 15185);
INSERT INTO ciudades VALUES (238, 8, 'Chivata', 15187);
INSERT INTO ciudades VALUES (239, 8, 'Chivor', 15236);
INSERT INTO ciudades VALUES (240, 8, 'Cienega', 15189);
INSERT INTO ciudades VALUES (241, 8, 'Combita', 15204);
INSERT INTO ciudades VALUES (242, 8, 'Coper', 15212);
INSERT INTO ciudades VALUES (243, 8, 'Corrales', 15215);
INSERT INTO ciudades VALUES (244, 8, 'Covarachia', 15218);
INSERT INTO ciudades VALUES (245, 8, 'Cubara', 15223);
INSERT INTO ciudades VALUES (246, 8, 'Cucaita', 15224);
INSERT INTO ciudades VALUES (247, 8, 'Cuitiva', 15226);
INSERT INTO ciudades VALUES (248, 8, 'Duitama', 15238);
INSERT INTO ciudades VALUES (249, 8, 'El Cocuy', 15244);
INSERT INTO ciudades VALUES (250, 8, 'El Espino', 15248);
INSERT INTO ciudades VALUES (251, 8, 'Firavitoba', 15272);
INSERT INTO ciudades VALUES (252, 8, 'Floresta', 15276);
INSERT INTO ciudades VALUES (253, 8, 'Gachantiva', 15293);
INSERT INTO ciudades VALUES (254, 8, 'Gameza', 15296);
INSERT INTO ciudades VALUES (255, 8, 'Garagoa', 15299);
INSERT INTO ciudades VALUES (256, 8, 'Guacamayas', 15317);
INSERT INTO ciudades VALUES (257, 8, 'Guateque', 15322);
INSERT INTO ciudades VALUES (258, 8, 'Guayata', 15325);
INSERT INTO ciudades VALUES (259, 8, 'Guican', 15332);
INSERT INTO ciudades VALUES (260, 8, 'Iza', 15362);
INSERT INTO ciudades VALUES (261, 8, 'Jenesano', 15367);
INSERT INTO ciudades VALUES (262, 8, 'Jerico', 15368);
INSERT INTO ciudades VALUES (263, 8, 'La Capilla', 15380);
INSERT INTO ciudades VALUES (264, 8, 'La Uvita', 15403);
INSERT INTO ciudades VALUES (265, 8, 'La Victoria', 15401);
INSERT INTO ciudades VALUES (266, 8, 'Labranzagrande', 15377);
INSERT INTO ciudades VALUES (267, 8, 'Macanal', 15425);
INSERT INTO ciudades VALUES (268, 8, 'Maripi', 15442);
INSERT INTO ciudades VALUES (269, 8, 'Miraflores', 15455);
INSERT INTO ciudades VALUES (270, 8, 'Mongua', 15464);
INSERT INTO ciudades VALUES (271, 8, 'Mongui', 15466);
INSERT INTO ciudades VALUES (272, 8, 'Moniquira', 15469);
INSERT INTO ciudades VALUES (273, 8, 'Motavita', 15476);
INSERT INTO ciudades VALUES (274, 8, 'Muzo', 15480);
INSERT INTO ciudades VALUES (275, 8, 'Nobsa', 15491);
INSERT INTO ciudades VALUES (276, 8, 'Nuevo Colon', 15494);
INSERT INTO ciudades VALUES (277, 8, 'Oicata', 15500);
INSERT INTO ciudades VALUES (278, 8, 'Otanche', 15507);
INSERT INTO ciudades VALUES (279, 8, 'Pachavita', 15511);
INSERT INTO ciudades VALUES (280, 8, 'Paez', 15514);
INSERT INTO ciudades VALUES (281, 8, 'Paipa', 15516);
INSERT INTO ciudades VALUES (282, 8, 'Pajarito', 15518);
INSERT INTO ciudades VALUES (283, 8, 'Panqueba', 15522);
INSERT INTO ciudades VALUES (284, 8, 'Pauna', 15531);
INSERT INTO ciudades VALUES (285, 8, 'Paya', 15533);
INSERT INTO ciudades VALUES (286, 8, 'Paz de Rio', 15537);
INSERT INTO ciudades VALUES (287, 8, 'Pesca', 15542);
INSERT INTO ciudades VALUES (288, 8, 'Pisba', 15550);
INSERT INTO ciudades VALUES (289, 8, 'Puerto Boyaca', 15572);
INSERT INTO ciudades VALUES (290, 8, 'Quipama', 15580);
INSERT INTO ciudades VALUES (291, 8, 'Ramiriqui', 15599);
INSERT INTO ciudades VALUES (292, 8, 'Raquira', 15600);
INSERT INTO ciudades VALUES (293, 8, 'Rondon', 15621);
INSERT INTO ciudades VALUES (294, 8, 'Saboya', 15632);
INSERT INTO ciudades VALUES (295, 8, 'Sachica', 15638);
INSERT INTO ciudades VALUES (296, 8, 'Samaca', 15646);
INSERT INTO ciudades VALUES (297, 8, 'San Eduardo', 15660);
INSERT INTO ciudades VALUES (298, 8, 'San Jose de Pare', 15664);
INSERT INTO ciudades VALUES (299, 8, 'San Luis de Gaceno', 15667);
INSERT INTO ciudades VALUES (300, 8, 'San Mateo', 15673);
INSERT INTO ciudades VALUES (301, 8, 'San Miguel de Sema', 15676);
INSERT INTO ciudades VALUES (302, 8, 'San Pablo de Borbur', 15681);
INSERT INTO ciudades VALUES (303, 8, 'Santa Maria', 15690);
INSERT INTO ciudades VALUES (304, 8, 'Santa Rosa de Viterbo', 15693);
INSERT INTO ciudades VALUES (305, 8, 'Santa Sofia', 15696);
INSERT INTO ciudades VALUES (306, 8, 'Santana', 15686);
INSERT INTO ciudades VALUES (307, 8, 'Sativanorte', 15720);
INSERT INTO ciudades VALUES (308, 8, 'Sativasur', 15723);
INSERT INTO ciudades VALUES (309, 8, 'Siachoque', 15740);
INSERT INTO ciudades VALUES (310, 8, 'Soata', 15753);
INSERT INTO ciudades VALUES (311, 8, 'Socha', 15757);
INSERT INTO ciudades VALUES (217, 8, 'Boyaca. Mpio. Desconocido', 15000);
INSERT INTO ciudades VALUES (312, 8, 'Socota', 15755);
INSERT INTO ciudades VALUES (313, 8, 'Sogamoso', 15759);
INSERT INTO ciudades VALUES (314, 8, 'Somondoco', 15761);
INSERT INTO ciudades VALUES (315, 8, 'Sora', 15762);
INSERT INTO ciudades VALUES (316, 8, 'Soraca', 15764);
INSERT INTO ciudades VALUES (317, 8, 'Sotaquira', 15763);
INSERT INTO ciudades VALUES (318, 8, 'Susacon', 15774);
INSERT INTO ciudades VALUES (319, 8, 'Sutamarchan', 15776);
INSERT INTO ciudades VALUES (320, 8, 'Sutatenza', 15778);
INSERT INTO ciudades VALUES (321, 8, 'Tasco', 15790);
INSERT INTO ciudades VALUES (322, 8, 'Tenza', 15798);
INSERT INTO ciudades VALUES (323, 8, 'Tibana', 15804);
INSERT INTO ciudades VALUES (324, 8, 'Tibasosa', 15806);
INSERT INTO ciudades VALUES (325, 8, 'Tinjaca', 15808);
INSERT INTO ciudades VALUES (326, 8, 'Tipacoque', 15810);
INSERT INTO ciudades VALUES (327, 8, 'Toca', 15814);
INSERT INTO ciudades VALUES (328, 8, 'Togui', 15816);
INSERT INTO ciudades VALUES (329, 8, 'Topaga', 15820);
INSERT INTO ciudades VALUES (330, 8, 'Tota', 15822);
INSERT INTO ciudades VALUES (331, 8, 'Tunja', 15001);
INSERT INTO ciudades VALUES (332, 8, 'Tunungua', 15832);
INSERT INTO ciudades VALUES (333, 8, 'Turmeque', 15835);
INSERT INTO ciudades VALUES (334, 8, 'Tuta', 15837);
INSERT INTO ciudades VALUES (335, 8, 'Tutaza', 15839);
INSERT INTO ciudades VALUES (336, 8, 'Umbita', 15842);
INSERT INTO ciudades VALUES (337, 8, 'Ventaquemada', 15861);
INSERT INTO ciudades VALUES (338, 8, 'VIlla de Leyva', 15407);
INSERT INTO ciudades VALUES (339, 8, 'Viracacha', 15879);
INSERT INTO ciudades VALUES (340, 8, 'Zetaquira', 15897);
INSERT INTO ciudades VALUES (342, 9, 'Aguadas', 17013);
INSERT INTO ciudades VALUES (343, 9, 'Anserma', 17042);
INSERT INTO ciudades VALUES (344, 9, 'Aranzazu', 17050);
INSERT INTO ciudades VALUES (345, 9, 'Belalcazar', 17088);
INSERT INTO ciudades VALUES (346, 9, 'Chinchina', 17174);
INSERT INTO ciudades VALUES (347, 9, 'Filadelfia', 17272);
INSERT INTO ciudades VALUES (348, 9, 'La Dorada', 17380);
INSERT INTO ciudades VALUES (349, 9, 'La Merced', 17388);
INSERT INTO ciudades VALUES (350, 9, 'Manizales', 17001);
INSERT INTO ciudades VALUES (351, 9, 'Manzanares', 17433);
INSERT INTO ciudades VALUES (352, 9, 'Marmato', 17442);
INSERT INTO ciudades VALUES (353, 9, 'Marquetalia', 17444);
INSERT INTO ciudades VALUES (354, 9, 'Marulanda', 17446);
INSERT INTO ciudades VALUES (355, 9, 'Neira', 17486);
INSERT INTO ciudades VALUES (356, 9, 'Norcasia', 17495);
INSERT INTO ciudades VALUES (357, 9, 'Pacora', 17513);
INSERT INTO ciudades VALUES (358, 9, 'Palestina', 17524);
INSERT INTO ciudades VALUES (359, 9, 'Pensilvania', 17541);
INSERT INTO ciudades VALUES (360, 9, 'Riosucio', 17614);
INSERT INTO ciudades VALUES (361, 9, 'Risaralda', 17616);
INSERT INTO ciudades VALUES (362, 9, 'Salamina', 17653);
INSERT INTO ciudades VALUES (363, 9, 'Samana', 17662);
INSERT INTO ciudades VALUES (364, 9, 'San Jose', 17665);
INSERT INTO ciudades VALUES (365, 9, 'Supia', 17777);
INSERT INTO ciudades VALUES (366, 9, 'Victoria', 17867);
INSERT INTO ciudades VALUES (367, 9, 'Villamaria', 17873);
INSERT INTO ciudades VALUES (368, 9, 'Viterbo', 17877);
INSERT INTO ciudades VALUES (370, 10, 'Albania', 18029);
INSERT INTO ciudades VALUES (371, 10, 'Belen de los Andaquies', 18094);
INSERT INTO ciudades VALUES (372, 10, 'Cartagena del Chaira', 18150);
INSERT INTO ciudades VALUES (373, 10, 'Curillo', 18205);
INSERT INTO ciudades VALUES (374, 10, 'El Doncello', 18247);
INSERT INTO ciudades VALUES (375, 10, 'El Paujil', 18256);
INSERT INTO ciudades VALUES (376, 10, 'Florencia', 18001);
INSERT INTO ciudades VALUES (377, 10, 'La Montanita', 18410);
INSERT INTO ciudades VALUES (378, 10, 'Milan', 18460);
INSERT INTO ciudades VALUES (379, 10, 'Morelia', 18479);
INSERT INTO ciudades VALUES (380, 10, 'Puerto Rico', 18592);
INSERT INTO ciudades VALUES (381, 10, 'San Jose del Fragua', 18610);
INSERT INTO ciudades VALUES (382, 10, 'San Vicente del Caguan', 18753);
INSERT INTO ciudades VALUES (383, 10, 'Solano', 18756);
INSERT INTO ciudades VALUES (384, 10, 'Solita', 18785);
INSERT INTO ciudades VALUES (385, 10, 'Valparaiso', 18860);
INSERT INTO ciudades VALUES (386, 11, 'Cartagena', 14001);
INSERT INTO ciudades VALUES (388, 12, 'Aguazul', 85010);
INSERT INTO ciudades VALUES (389, 12, 'Chameza', 85015);
INSERT INTO ciudades VALUES (390, 12, 'Hato Corozal', 85125);
INSERT INTO ciudades VALUES (391, 12, 'La Salina', 85136);
INSERT INTO ciudades VALUES (392, 12, 'Mani', 85139);
INSERT INTO ciudades VALUES (393, 12, 'Monterrey', 85162);
INSERT INTO ciudades VALUES (394, 12, 'Nunchia', 85225);
INSERT INTO ciudades VALUES (395, 12, 'Orocue', 85230);
INSERT INTO ciudades VALUES (396, 12, 'Paz de Ariporo', 85250);
INSERT INTO ciudades VALUES (397, 12, 'Pore', 85263);
INSERT INTO ciudades VALUES (398, 12, 'Recetor', 85279);
INSERT INTO ciudades VALUES (399, 12, 'Sabanalarga', 85300);
INSERT INTO ciudades VALUES (400, 12, 'Sacama', 85315);
INSERT INTO ciudades VALUES (401, 12, 'San Luis de Palenque', 85325);
INSERT INTO ciudades VALUES (402, 12, 'Tamara', 85400);
INSERT INTO ciudades VALUES (403, 12, 'Tauramena', 85410);
INSERT INTO ciudades VALUES (404, 12, 'Trinidad', 85430);
INSERT INTO ciudades VALUES (405, 12, 'Villanueva', 85440);
INSERT INTO ciudades VALUES (406, 12, 'Yopal', 85001);
INSERT INTO ciudades VALUES (408, 13, 'Almaguer', 19022);
INSERT INTO ciudades VALUES (409, 13, 'Argelia', 19050);
INSERT INTO ciudades VALUES (410, 13, 'Balboa', 19075);
INSERT INTO ciudades VALUES (411, 13, 'Bolivar', 19100);
INSERT INTO ciudades VALUES (412, 13, 'Buenos Aires', 19110);
INSERT INTO ciudades VALUES (413, 13, 'Cajibio', 19130);
INSERT INTO ciudades VALUES (414, 13, 'Caldono', 19137);
INSERT INTO ciudades VALUES (415, 13, 'Caloto', 19142);
INSERT INTO ciudades VALUES (416, 13, 'Corinto', 19212);
INSERT INTO ciudades VALUES (417, 13, 'El Tambo', 19256);
INSERT INTO ciudades VALUES (418, 13, 'Florencia', 19290);
INSERT INTO ciudades VALUES (419, 13, 'Guapi', 19318);
INSERT INTO ciudades VALUES (420, 13, 'Inza', 19355);
INSERT INTO ciudades VALUES (421, 13, 'Jambalo', 19364);
INSERT INTO ciudades VALUES (422, 13, 'La Sierra', 19392);
INSERT INTO ciudades VALUES (423, 13, 'La Vega', 19397);
INSERT INTO ciudades VALUES (424, 13, 'Lopez (Micay)', 19418);
INSERT INTO ciudades VALUES (425, 13, 'Mercaderes', 19450);
INSERT INTO ciudades VALUES (426, 13, 'Miranda', 19455);
INSERT INTO ciudades VALUES (427, 13, 'Morales', 19473);
INSERT INTO ciudades VALUES (428, 13, 'Padilla', 19513);
INSERT INTO ciudades VALUES (429, 13, 'Paez', 19517);
INSERT INTO ciudades VALUES (430, 13, 'Patia (EL Bordo)', 19532);
INSERT INTO ciudades VALUES (431, 13, 'Piamonte', 19533);
INSERT INTO ciudades VALUES (432, 13, 'Piendamo', 19548);
INSERT INTO ciudades VALUES (433, 13, 'Popayan', 19001);
INSERT INTO ciudades VALUES (434, 13, 'Puerto Tejada', 19573);
INSERT INTO ciudades VALUES (435, 13, 'Purace', 19585);
INSERT INTO ciudades VALUES (436, 13, 'Rosas', 19622);
INSERT INTO ciudades VALUES (437, 13, 'San Sebastian', 19693);
INSERT INTO ciudades VALUES (438, 13, 'Santa Rosa', 19701);
INSERT INTO ciudades VALUES (439, 13, 'Santander de Quilichao', 19698);
INSERT INTO ciudades VALUES (440, 13, 'Silvia', 19743);
INSERT INTO ciudades VALUES (441, 13, 'Sotara', 19760);
INSERT INTO ciudades VALUES (442, 13, 'Suarez', 19780);
INSERT INTO ciudades VALUES (443, 13, 'Sucre', 19785);
INSERT INTO ciudades VALUES (444, 13, 'Timbio', 19807);
INSERT INTO ciudades VALUES (445, 13, 'Timbiqui', 19809);
INSERT INTO ciudades VALUES (446, 13, 'Toribio', 19821);
INSERT INTO ciudades VALUES (447, 13, 'ToToro', 19824);
INSERT INTO ciudades VALUES (448, 13, 'Villarica', 19845);
INSERT INTO ciudades VALUES (450, 14, 'Aguachica', 20011);
INSERT INTO ciudades VALUES (451, 14, 'Agustin Codazzi', 20013);
INSERT INTO ciudades VALUES (452, 14, 'Astrea', 20032);
INSERT INTO ciudades VALUES (453, 14, 'Becerril', 20045);
INSERT INTO ciudades VALUES (454, 14, 'Bosconia', 20060);
INSERT INTO ciudades VALUES (455, 14, 'Chimichagua', 20175);
INSERT INTO ciudades VALUES (456, 14, 'Chiriguana', 20178);
INSERT INTO ciudades VALUES (457, 14, 'Curumani', 20228);
INSERT INTO ciudades VALUES (458, 14, 'El Copey', 20238);
INSERT INTO ciudades VALUES (459, 14, 'El Paso', 20250);
INSERT INTO ciudades VALUES (460, 14, 'Gamarra', 20295);
INSERT INTO ciudades VALUES (369, 10, 'Caqueta. Mpio. Desconocido', 18000);
INSERT INTO ciudades VALUES (387, 12, 'Casanare. Mpio. Desconocido', 85000);
INSERT INTO ciudades VALUES (407, 13, 'Cauca. Mpio. Desconocido', 19000);
INSERT INTO ciudades VALUES (449, 14, 'Cesar. Mpio. Desconocido', 20000);
INSERT INTO ciudades VALUES (461, 14, 'Gonzalez', 20310);
INSERT INTO ciudades VALUES (462, 14, 'La Gloria', 20383);
INSERT INTO ciudades VALUES (463, 14, 'La Jagua de Ibirico', 20400);
INSERT INTO ciudades VALUES (464, 14, 'Manaure Balcon del Cesar', 20443);
INSERT INTO ciudades VALUES (465, 14, 'Pailitas', 20517);
INSERT INTO ciudades VALUES (466, 14, 'Pelaya', 20550);
INSERT INTO ciudades VALUES (467, 14, 'Pueblo Bello', 20570);
INSERT INTO ciudades VALUES (468, 14, 'Rio de Oro', 20614);
INSERT INTO ciudades VALUES (469, 14, 'Robles (La Paz)', 20621);
INSERT INTO ciudades VALUES (470, 14, 'San Alberto', 20710);
INSERT INTO ciudades VALUES (471, 14, 'San Diego', 20750);
INSERT INTO ciudades VALUES (472, 14, 'San Martin', 20770);
INSERT INTO ciudades VALUES (473, 14, 'Tamalameque', 20787);
INSERT INTO ciudades VALUES (474, 14, 'Valledupar', 20001);
INSERT INTO ciudades VALUES (476, 15, 'Acandi', 27006);
INSERT INTO ciudades VALUES (477, 15, 'Alto Baudo (Pie de Pato)', 27025);
INSERT INTO ciudades VALUES (478, 15, 'Atrato', 27050);
INSERT INTO ciudades VALUES (479, 15, 'Bagado', 27073);
INSERT INTO ciudades VALUES (480, 15, 'Bahia Solano (Mutis)', 27075);
INSERT INTO ciudades VALUES (481, 15, 'Bajo Baudo (Pizarro)', 27077);
INSERT INTO ciudades VALUES (482, 15, 'BelÃ©n de Bajira', 27086);
INSERT INTO ciudades VALUES (483, 15, 'Bojaya (Bellavista)', 27099);
INSERT INTO ciudades VALUES (484, 15, 'Canton de San Pablo (Managru)', 27135);
INSERT INTO ciudades VALUES (485, 15, 'Carmen del Darien', 27150);
INSERT INTO ciudades VALUES (486, 15, 'Certegui', 27160);
INSERT INTO ciudades VALUES (487, 15, 'Condoto', 27205);
INSERT INTO ciudades VALUES (488, 15, 'El Carmen de Atrato', 27245);
INSERT INTO ciudades VALUES (489, 15, 'Itsmina', 27361);
INSERT INTO ciudades VALUES (490, 15, 'Jurado', 27372);
INSERT INTO ciudades VALUES (491, 15, 'Litoral del Bajo San Juan', 27250);
INSERT INTO ciudades VALUES (492, 15, 'Lloro', 27413);
INSERT INTO ciudades VALUES (493, 15, 'Medio Atrato', 27425);
INSERT INTO ciudades VALUES (494, 15, 'Medio Baudo (Boca de Pepe)', 27430);
INSERT INTO ciudades VALUES (495, 15, 'Medio San Juan', 27450);
INSERT INTO ciudades VALUES (496, 15, 'Novita', 27491);
INSERT INTO ciudades VALUES (497, 15, 'Nuqui', 27495);
INSERT INTO ciudades VALUES (498, 15, 'Quibdo', 27001);
INSERT INTO ciudades VALUES (499, 15, 'Rio Iro', 27580);
INSERT INTO ciudades VALUES (500, 15, 'Rioquito', 27600);
INSERT INTO ciudades VALUES (501, 15, 'Riosucio', 27615);
INSERT INTO ciudades VALUES (502, 15, 'San Jose del Palmar', 27660);
INSERT INTO ciudades VALUES (503, 15, 'Sipi', 27745);
INSERT INTO ciudades VALUES (504, 15, 'Tado', 27787);
INSERT INTO ciudades VALUES (505, 15, 'Unguia', 27800);
INSERT INTO ciudades VALUES (506, 15, 'Union Panamericana', 27810);
INSERT INTO ciudades VALUES (508, 16, 'Ayapel', 23068);
INSERT INTO ciudades VALUES (509, 16, 'Buenavista', 23079);
INSERT INTO ciudades VALUES (510, 16, 'Canalete', 23090);
INSERT INTO ciudades VALUES (511, 16, 'Cerete', 23162);
INSERT INTO ciudades VALUES (512, 16, 'Chima', 23168);
INSERT INTO ciudades VALUES (513, 16, 'Chinu', 23182);
INSERT INTO ciudades VALUES (514, 16, 'Cienaga de Oro', 23189);
INSERT INTO ciudades VALUES (515, 16, 'Cotorra', 23300);
INSERT INTO ciudades VALUES (516, 16, 'La Apartada', 23350);
INSERT INTO ciudades VALUES (517, 16, 'Lorica', 23417);
INSERT INTO ciudades VALUES (518, 16, 'Los Cordobas', 23419);
INSERT INTO ciudades VALUES (519, 16, 'Momil', 23464);
INSERT INTO ciudades VALUES (520, 16, 'Montelibano', 23466);
INSERT INTO ciudades VALUES (521, 16, 'Monteria', 23001);
INSERT INTO ciudades VALUES (522, 16, 'MoÃ±itos', 23500);
INSERT INTO ciudades VALUES (523, 16, 'Planeta Rica', 23555);
INSERT INTO ciudades VALUES (524, 16, 'Pueblo Nuevo', 23570);
INSERT INTO ciudades VALUES (525, 16, 'Puerto Escondido', 23574);
INSERT INTO ciudades VALUES (526, 16, 'Puerto Libertador', 23580);
INSERT INTO ciudades VALUES (527, 16, 'Purisima', 23586);
INSERT INTO ciudades VALUES (528, 16, 'Sahagun', 23660);
INSERT INTO ciudades VALUES (529, 16, 'San Andres Sotavento', 23670);
INSERT INTO ciudades VALUES (530, 16, 'San Antero', 23672);
INSERT INTO ciudades VALUES (531, 16, 'San Bernardo del Viento', 23675);
INSERT INTO ciudades VALUES (532, 16, 'San Carlos', 23678);
INSERT INTO ciudades VALUES (533, 16, 'San Pelayo', 23686);
INSERT INTO ciudades VALUES (534, 16, 'Tierralta', 23807);
INSERT INTO ciudades VALUES (535, 16, 'Valencia', 23855);
INSERT INTO ciudades VALUES (537, 17, 'Agua de Dios', 25001);
INSERT INTO ciudades VALUES (538, 17, 'Alban', 25019);
INSERT INTO ciudades VALUES (539, 17, 'Anapoima', 25035);
INSERT INTO ciudades VALUES (540, 17, 'Anolaima', 25040);
INSERT INTO ciudades VALUES (541, 17, 'Arbelaez', 25053);
INSERT INTO ciudades VALUES (542, 17, 'Beltran', 25086);
INSERT INTO ciudades VALUES (543, 17, 'Bituima', 25095);
INSERT INTO ciudades VALUES (544, 17, 'Bojaca', 25099);
INSERT INTO ciudades VALUES (545, 17, 'Cabrera', 25120);
INSERT INTO ciudades VALUES (546, 17, 'Cachipay', 25123);
INSERT INTO ciudades VALUES (547, 17, 'Cajica', 25126);
INSERT INTO ciudades VALUES (548, 17, 'Caparrapi', 25148);
INSERT INTO ciudades VALUES (549, 17, 'Caqueza', 25151);
INSERT INTO ciudades VALUES (550, 17, 'Carmen de Carupa', 25154);
INSERT INTO ciudades VALUES (551, 17, 'Chaguani', 25168);
INSERT INTO ciudades VALUES (552, 17, 'Chia', 25175);
INSERT INTO ciudades VALUES (553, 17, 'Chipaque', 25178);
INSERT INTO ciudades VALUES (554, 17, 'Choachi', 25181);
INSERT INTO ciudades VALUES (555, 17, 'Choconta', 25183);
INSERT INTO ciudades VALUES (556, 17, 'Cogua', 25200);
INSERT INTO ciudades VALUES (557, 17, 'Cota', 25214);
INSERT INTO ciudades VALUES (558, 17, 'Cucunuba', 25224);
INSERT INTO ciudades VALUES (559, 17, 'El Colegio', 25245);
INSERT INTO ciudades VALUES (560, 17, 'El PeÃ±on', 25258);
INSERT INTO ciudades VALUES (561, 17, 'El Rosal', 25260);
INSERT INTO ciudades VALUES (562, 17, 'Facatativa', 25269);
INSERT INTO ciudades VALUES (563, 17, 'Fomeque', 25279);
INSERT INTO ciudades VALUES (564, 17, 'Fosca', 25281);
INSERT INTO ciudades VALUES (565, 17, 'Funza', 25286);
INSERT INTO ciudades VALUES (566, 17, 'Fuquene', 25288);
INSERT INTO ciudades VALUES (567, 17, 'Fusagasuga', 25290);
INSERT INTO ciudades VALUES (568, 17, 'Gachala', 25293);
INSERT INTO ciudades VALUES (569, 17, 'Gachancipa', 25295);
INSERT INTO ciudades VALUES (570, 17, 'Gacheta', 25297);
INSERT INTO ciudades VALUES (571, 17, 'Gama', 25299);
INSERT INTO ciudades VALUES (572, 17, 'Girardot', 25307);
INSERT INTO ciudades VALUES (573, 17, 'Granada', 25312);
INSERT INTO ciudades VALUES (574, 17, 'Guacheta', 25317);
INSERT INTO ciudades VALUES (575, 17, 'Guaduas', 25320);
INSERT INTO ciudades VALUES (576, 17, 'Guasca', 25322);
INSERT INTO ciudades VALUES (577, 17, 'Guataqui', 25324);
INSERT INTO ciudades VALUES (578, 17, 'Guatavita', 25326);
INSERT INTO ciudades VALUES (579, 17, 'Guayabal de Siquima', 25328);
INSERT INTO ciudades VALUES (580, 17, 'Guayabetal', 25335);
INSERT INTO ciudades VALUES (581, 17, 'Gutierrez', 25339);
INSERT INTO ciudades VALUES (582, 17, 'Jerusalen', 25368);
INSERT INTO ciudades VALUES (583, 17, 'Junin', 25372);
INSERT INTO ciudades VALUES (584, 17, 'La Calera', 25377);
INSERT INTO ciudades VALUES (585, 17, 'La Mesa', 25386);
INSERT INTO ciudades VALUES (586, 17, 'La Palma', 25394);
INSERT INTO ciudades VALUES (587, 17, 'La PeÃ±a', 25398);
INSERT INTO ciudades VALUES (588, 17, 'La Vega', 25402);
INSERT INTO ciudades VALUES (589, 17, 'Lenguazaque', 25407);
INSERT INTO ciudades VALUES (590, 17, 'Macheta', 25426);
INSERT INTO ciudades VALUES (591, 17, 'Madrid', 25430);
INSERT INTO ciudades VALUES (592, 17, 'Manta', 25436);
INSERT INTO ciudades VALUES (593, 17, 'Medina', 25438);
INSERT INTO ciudades VALUES (594, 17, 'Mosquera', 25473);
INSERT INTO ciudades VALUES (595, 17, 'NariÃ±o', 25483);
INSERT INTO ciudades VALUES (596, 17, 'Nemocon', 25486);
INSERT INTO ciudades VALUES (597, 17, 'Nilo', 25488);
INSERT INTO ciudades VALUES (598, 17, 'Nimaima', 25489);
INSERT INTO ciudades VALUES (599, 17, 'Nocaima', 25491);
INSERT INTO ciudades VALUES (600, 17, 'Ospina Perez (Venecia)', 25506);
INSERT INTO ciudades VALUES (601, 17, 'Pacho', 25513);
INSERT INTO ciudades VALUES (602, 17, 'Paime', 25518);
INSERT INTO ciudades VALUES (603, 17, 'Pandi', 25524);
INSERT INTO ciudades VALUES (604, 17, 'Paratebueno', 25530);
INSERT INTO ciudades VALUES (605, 17, 'Pasca', 25535);
INSERT INTO ciudades VALUES (507, 16, 'Cordoba. Mpio. Desconocido', 23000);
INSERT INTO ciudades VALUES (536, 17, 'Cundinamarca. Mpio. Desconoc', 25000);
INSERT INTO ciudades VALUES (606, 17, 'Puerto Salgar', 25572);
INSERT INTO ciudades VALUES (607, 17, 'Puli', 25580);
INSERT INTO ciudades VALUES (608, 17, 'Quebradanegra', 25592);
INSERT INTO ciudades VALUES (609, 17, 'Quetame', 25594);
INSERT INTO ciudades VALUES (610, 17, 'Quipile', 25596);
INSERT INTO ciudades VALUES (611, 17, 'Rafael Reyes (Apulo)', 25599);
INSERT INTO ciudades VALUES (612, 17, 'Ricaurte', 25612);
INSERT INTO ciudades VALUES (613, 17, 'San Antonio de Tequendama', 25645);
INSERT INTO ciudades VALUES (614, 17, 'San Bernardo', 25649);
INSERT INTO ciudades VALUES (615, 17, 'San Cayetano', 25653);
INSERT INTO ciudades VALUES (616, 17, 'San Francisco', 25658);
INSERT INTO ciudades VALUES (617, 17, 'San Juan de Rio Seco', 25662);
INSERT INTO ciudades VALUES (618, 17, 'Sasaima', 25718);
INSERT INTO ciudades VALUES (619, 17, 'Sesquile', 25736);
INSERT INTO ciudades VALUES (620, 17, 'Sibate', 25740);
INSERT INTO ciudades VALUES (621, 17, 'Silvania', 25743);
INSERT INTO ciudades VALUES (622, 17, 'Simijaca', 25745);
INSERT INTO ciudades VALUES (623, 17, 'Soacha', 25754);
INSERT INTO ciudades VALUES (624, 17, 'Sopo', 25758);
INSERT INTO ciudades VALUES (625, 17, 'Subachoque', 25769);
INSERT INTO ciudades VALUES (626, 17, 'Suesca', 25772);
INSERT INTO ciudades VALUES (627, 17, 'Supata', 25777);
INSERT INTO ciudades VALUES (628, 17, 'Susa', 25779);
INSERT INTO ciudades VALUES (629, 17, 'Sutatausa', 25781);
INSERT INTO ciudades VALUES (630, 17, 'Tabio', 25785);
INSERT INTO ciudades VALUES (631, 17, 'Tausa', 25793);
INSERT INTO ciudades VALUES (632, 17, 'Tena', 25797);
INSERT INTO ciudades VALUES (633, 17, 'Tenjo', 25799);
INSERT INTO ciudades VALUES (634, 17, 'Tibacuy', 25805);
INSERT INTO ciudades VALUES (635, 17, 'Tibirita', 25807);
INSERT INTO ciudades VALUES (636, 17, 'Tocaima', 25815);
INSERT INTO ciudades VALUES (637, 17, 'Tocancipa', 25817);
INSERT INTO ciudades VALUES (638, 17, 'Topaipi', 25823);
INSERT INTO ciudades VALUES (639, 17, 'Ubala', 25839);
INSERT INTO ciudades VALUES (640, 17, 'Ubaque', 25841);
INSERT INTO ciudades VALUES (641, 17, 'Ubate', 25843);
INSERT INTO ciudades VALUES (642, 17, 'Une', 25845);
INSERT INTO ciudades VALUES (643, 17, 'Utica', 25851);
INSERT INTO ciudades VALUES (644, 17, 'Vergara', 25862);
INSERT INTO ciudades VALUES (645, 17, 'Viani', 25867);
INSERT INTO ciudades VALUES (646, 17, 'Villagomez', 25871);
INSERT INTO ciudades VALUES (647, 17, 'Villapinzon', 25873);
INSERT INTO ciudades VALUES (648, 17, 'Villeta', 25875);
INSERT INTO ciudades VALUES (649, 17, 'Viota', 25878);
INSERT INTO ciudades VALUES (650, 17, 'Yacopi', 25885);
INSERT INTO ciudades VALUES (651, 17, 'Zipacon', 25898);
INSERT INTO ciudades VALUES (652, 17, 'Zipaquira', 25899);
INSERT INTO ciudades VALUES (654, 18, 'Barranco Minas (CD)', 94343);
INSERT INTO ciudades VALUES (655, 18, 'Cacahual (CD)', 94886);
INSERT INTO ciudades VALUES (656, 18, 'La Guadalupe (CD)', 94885);
INSERT INTO ciudades VALUES (657, 18, 'Mapiripana (CD)', 94663);
INSERT INTO ciudades VALUES (658, 18, 'Morichal (Morichal Nuevo) (CD)', 94888);
INSERT INTO ciudades VALUES (659, 18, 'Pana Pana (Campo Alegre) (CD)', 94887);
INSERT INTO ciudades VALUES (660, 18, 'Puerto Colombia (CD)', 94884);
INSERT INTO ciudades VALUES (661, 18, 'Puerto Inirida', 94001);
INSERT INTO ciudades VALUES (662, 19, 'San Felipe (CD)', 94883);
INSERT INTO ciudades VALUES (664, 19, 'Calamar', 95015);
INSERT INTO ciudades VALUES (665, 19, 'El Retorno', 95025);
INSERT INTO ciudades VALUES (666, 19, 'Miraflores', 95200);
INSERT INTO ciudades VALUES (667, 19, 'San Jose del Guaviare', 95001);
INSERT INTO ciudades VALUES (669, 20, 'Acevedo', 41006);
INSERT INTO ciudades VALUES (670, 20, 'Agrado', 41013);
INSERT INTO ciudades VALUES (671, 20, 'Aipe', 41016);
INSERT INTO ciudades VALUES (672, 20, 'Algeciras', 41020);
INSERT INTO ciudades VALUES (673, 20, 'Altamira', 41026);
INSERT INTO ciudades VALUES (674, 20, 'Baraya', 41078);
INSERT INTO ciudades VALUES (675, 20, 'Campoalegre', 41132);
INSERT INTO ciudades VALUES (676, 20, 'Colombia', 41206);
INSERT INTO ciudades VALUES (677, 20, 'Elias', 41244);
INSERT INTO ciudades VALUES (678, 20, 'Garzon', 41298);
INSERT INTO ciudades VALUES (679, 20, 'Gigante', 41306);
INSERT INTO ciudades VALUES (680, 20, 'Guadalupe', 41319);
INSERT INTO ciudades VALUES (681, 20, 'Hobo', 41349);
INSERT INTO ciudades VALUES (682, 20, 'Iquira', 41357);
INSERT INTO ciudades VALUES (683, 20, 'Isnos (San Jose de Isnos)', 41359);
INSERT INTO ciudades VALUES (684, 20, 'La Argentina', 41378);
INSERT INTO ciudades VALUES (685, 20, 'La Plata', 41396);
INSERT INTO ciudades VALUES (686, 20, 'Nataga', 41483);
INSERT INTO ciudades VALUES (687, 20, 'Neiva', 41001);
INSERT INTO ciudades VALUES (688, 20, 'Oporapa', 41503);
INSERT INTO ciudades VALUES (689, 20, 'Paicol', 41518);
INSERT INTO ciudades VALUES (690, 20, 'Palermo', 41524);
INSERT INTO ciudades VALUES (691, 20, 'Palestina', 41530);
INSERT INTO ciudades VALUES (692, 20, 'Pital', 41548);
INSERT INTO ciudades VALUES (693, 20, 'Pitalito', 41551);
INSERT INTO ciudades VALUES (694, 20, 'Rivera', 41615);
INSERT INTO ciudades VALUES (695, 20, 'Saladoblanco', 41660);
INSERT INTO ciudades VALUES (696, 20, 'San Agustin', 41668);
INSERT INTO ciudades VALUES (697, 20, 'Santa Maria', 41676);
INSERT INTO ciudades VALUES (698, 20, 'Suaza', 41770);
INSERT INTO ciudades VALUES (699, 20, 'Tarqui', 41791);
INSERT INTO ciudades VALUES (700, 20, 'Tello', 41799);
INSERT INTO ciudades VALUES (701, 20, 'Teruel', 41801);
INSERT INTO ciudades VALUES (702, 20, 'Tesalia', 41797);
INSERT INTO ciudades VALUES (703, 20, 'Timana', 41807);
INSERT INTO ciudades VALUES (704, 20, 'Villavieja', 41872);
INSERT INTO ciudades VALUES (705, 20, 'Yaguara', 41885);
INSERT INTO ciudades VALUES (707, 21, 'Albania', 44035);
INSERT INTO ciudades VALUES (708, 21, 'Barrancas', 44078);
INSERT INTO ciudades VALUES (709, 21, 'Dibulla', 44090);
INSERT INTO ciudades VALUES (710, 21, 'Distraccion', 44098);
INSERT INTO ciudades VALUES (711, 21, 'El Molino', 44110);
INSERT INTO ciudades VALUES (712, 21, 'Fonseca', 44279);
INSERT INTO ciudades VALUES (713, 21, 'Hatonuevo', 44378);
INSERT INTO ciudades VALUES (714, 21, 'La Jagua del Pilar', 44420);
INSERT INTO ciudades VALUES (715, 21, 'Maicao', 44430);
INSERT INTO ciudades VALUES (716, 21, 'Manaure', 44560);
INSERT INTO ciudades VALUES (717, 21, 'Riohacha', 44001);
INSERT INTO ciudades VALUES (718, 21, 'San Juan del Cesar', 44650);
INSERT INTO ciudades VALUES (719, 21, 'Uribia', 44847);
INSERT INTO ciudades VALUES (720, 21, 'Urumita', 44855);
INSERT INTO ciudades VALUES (721, 21, 'Villanueva', 44874);
INSERT INTO ciudades VALUES (723, 22, 'Algarrobo', 47030);
INSERT INTO ciudades VALUES (724, 22, 'Aracataca', 47053);
INSERT INTO ciudades VALUES (725, 22, 'Ariguani (El Dificil)', 47058);
INSERT INTO ciudades VALUES (726, 22, 'Cerro San Antonio', 47161);
INSERT INTO ciudades VALUES (727, 22, 'Chivolo', 47170);
INSERT INTO ciudades VALUES (728, 22, 'Cienaga', 47189);
INSERT INTO ciudades VALUES (729, 22, 'Concordia', 47205);
INSERT INTO ciudades VALUES (730, 22, 'El Banco', 47245);
INSERT INTO ciudades VALUES (731, 22, 'El PiÃ±on', 47258);
INSERT INTO ciudades VALUES (732, 22, 'El Reten', 47268);
INSERT INTO ciudades VALUES (733, 22, 'Fundacion', 47288);
INSERT INTO ciudades VALUES (734, 22, 'Guamal', 47318);
INSERT INTO ciudades VALUES (735, 22, 'Nueva Granada', 47460);
INSERT INTO ciudades VALUES (736, 22, 'Pedraza', 47541);
INSERT INTO ciudades VALUES (737, 22, 'PijiÃ±o del Carmen (PijiÃ±o)', 47545);
INSERT INTO ciudades VALUES (738, 22, 'Pivijay', 47551);
INSERT INTO ciudades VALUES (739, 22, 'Plato', 47555);
INSERT INTO ciudades VALUES (740, 22, 'Puebloviejo', 47570);
INSERT INTO ciudades VALUES (741, 22, 'Remolino', 47605);
INSERT INTO ciudades VALUES (742, 22, 'Sabanas de San Angel', 47660);
INSERT INTO ciudades VALUES (743, 22, 'Salamina', 47675);
INSERT INTO ciudades VALUES (744, 22, 'San Sebastian de Buenavista', 47692);
INSERT INTO ciudades VALUES (745, 22, 'San Zenon', 47703);
INSERT INTO ciudades VALUES (746, 22, 'Santa Ana', 47707);
INSERT INTO ciudades VALUES (747, 22, 'Santa Barbara de Pinto', 47720);
INSERT INTO ciudades VALUES (748, 22, 'Sitio Nuevo', 47745);
INSERT INTO ciudades VALUES (749, 22, 'Tenerife', 47798);
INSERT INTO ciudades VALUES (750, 22, 'Zapayan', 47960);
INSERT INTO ciudades VALUES (663, 19, 'Guaviare. Mpio. Desconocido', 95000);
INSERT INTO ciudades VALUES (668, 20, 'Huila. Mpio. Desconocido', 41000);
INSERT INTO ciudades VALUES (706, 21, 'La Guajira. Mpio. Desconoc.', 44000);
INSERT INTO ciudades VALUES (751, 22, 'Zona Bananera', 47980);
INSERT INTO ciudades VALUES (753, 23, 'Acacias', 50006);
INSERT INTO ciudades VALUES (754, 23, 'Barranca de Upia', 50110);
INSERT INTO ciudades VALUES (755, 23, 'Cabuyaro', 50124);
INSERT INTO ciudades VALUES (756, 23, 'Castilla La Nueva', 50150);
INSERT INTO ciudades VALUES (757, 23, 'Cubarral', 50223);
INSERT INTO ciudades VALUES (758, 23, 'Cumaral', 50226);
INSERT INTO ciudades VALUES (759, 23, 'El Calvario', 50245);
INSERT INTO ciudades VALUES (760, 23, 'El Castillo', 50251);
INSERT INTO ciudades VALUES (761, 23, 'El Dorado', 50270);
INSERT INTO ciudades VALUES (762, 23, 'Fuente de Oro', 50287);
INSERT INTO ciudades VALUES (763, 23, 'Granada', 50313);
INSERT INTO ciudades VALUES (764, 23, 'Guamal', 50318);
INSERT INTO ciudades VALUES (765, 23, 'La Macarena', 50350);
INSERT INTO ciudades VALUES (766, 23, 'La Uribe', 50370);
INSERT INTO ciudades VALUES (767, 23, 'Lejanias', 50400);
INSERT INTO ciudades VALUES (768, 23, 'Mapiripan', 50325);
INSERT INTO ciudades VALUES (769, 23, 'Mesetas', 50330);
INSERT INTO ciudades VALUES (770, 23, 'Puerto Concordia', 50450);
INSERT INTO ciudades VALUES (771, 23, 'Puerto Gaitan', 50568);
INSERT INTO ciudades VALUES (772, 23, 'Puerto Lleras', 50577);
INSERT INTO ciudades VALUES (773, 23, 'Puerto Lopez', 50573);
INSERT INTO ciudades VALUES (774, 23, 'Puerto Rico', 50590);
INSERT INTO ciudades VALUES (775, 23, 'Restrepo', 50606);
INSERT INTO ciudades VALUES (776, 23, 'San Carlos de Guaroa', 50680);
INSERT INTO ciudades VALUES (777, 23, 'San Juan de Arama', 50683);
INSERT INTO ciudades VALUES (778, 23, 'San Juanito', 50686);
INSERT INTO ciudades VALUES (779, 23, 'San Martin', 50689);
INSERT INTO ciudades VALUES (780, 23, 'Villavicencio', 50001);
INSERT INTO ciudades VALUES (781, 23, 'Vistahermosa', 50711);
INSERT INTO ciudades VALUES (783, 24, 'Alban (San Jose)', 52019);
INSERT INTO ciudades VALUES (784, 24, 'Aldana', 52022);
INSERT INTO ciudades VALUES (785, 24, 'Ancuya', 52036);
INSERT INTO ciudades VALUES (786, 24, 'Arboleda (Berruecos)', 52051);
INSERT INTO ciudades VALUES (787, 24, 'Barbacoas', 52079);
INSERT INTO ciudades VALUES (788, 24, 'Belen', 52083);
INSERT INTO ciudades VALUES (789, 24, 'Buesaco', 52110);
INSERT INTO ciudades VALUES (790, 24, 'Chachagui', 52240);
INSERT INTO ciudades VALUES (791, 24, 'Colon (Genova)', 52203);
INSERT INTO ciudades VALUES (792, 24, 'Consaca', 52207);
INSERT INTO ciudades VALUES (793, 24, 'Contadero', 52210);
INSERT INTO ciudades VALUES (794, 24, 'Cordoba', 52215);
INSERT INTO ciudades VALUES (795, 24, 'Cuaspud (Carlosama)', 52224);
INSERT INTO ciudades VALUES (796, 24, 'Cumbal', 52227);
INSERT INTO ciudades VALUES (797, 24, 'Cumbitara', 52233);
INSERT INTO ciudades VALUES (798, 24, 'El Charco', 52250);
INSERT INTO ciudades VALUES (799, 24, 'El PeÃ±ol', 52254);
INSERT INTO ciudades VALUES (800, 24, 'El Rosario', 52256);
INSERT INTO ciudades VALUES (801, 24, 'El Tablon', 52258);
INSERT INTO ciudades VALUES (802, 24, 'El Tambo', 52260);
INSERT INTO ciudades VALUES (803, 24, 'Francisco Pizarro (Salahonda)', 52520);
INSERT INTO ciudades VALUES (804, 24, 'Funes', 52287);
INSERT INTO ciudades VALUES (805, 24, 'Guachucal', 52317);
INSERT INTO ciudades VALUES (806, 24, 'Guaitarilla', 52320);
INSERT INTO ciudades VALUES (807, 24, 'Gualmatan', 52323);
INSERT INTO ciudades VALUES (808, 24, 'Iles', 52352);
INSERT INTO ciudades VALUES (809, 24, 'Imues', 52354);
INSERT INTO ciudades VALUES (810, 24, 'Ipiales', 52356);
INSERT INTO ciudades VALUES (811, 24, 'La Cruz', 52378);
INSERT INTO ciudades VALUES (812, 24, 'La Florida', 52381);
INSERT INTO ciudades VALUES (813, 24, 'La Llanada', 52385);
INSERT INTO ciudades VALUES (814, 24, 'La Tola', 52390);
INSERT INTO ciudades VALUES (815, 24, 'La Union', 52399);
INSERT INTO ciudades VALUES (816, 24, 'Leiva', 52405);
INSERT INTO ciudades VALUES (817, 24, 'Linares', 52411);
INSERT INTO ciudades VALUES (818, 24, 'Los Andes (Sotomayor)', 52418);
INSERT INTO ciudades VALUES (819, 24, 'Magui (Payan)', 52427);
INSERT INTO ciudades VALUES (820, 24, 'Mallama (Piedrancha)', 52435);
INSERT INTO ciudades VALUES (821, 24, 'Mosquera', 52473);
INSERT INTO ciudades VALUES (822, 24, 'NariÃ±o', 52480);
INSERT INTO ciudades VALUES (823, 24, 'Olaya Herrera(Bocas de Satinga', 52490);
INSERT INTO ciudades VALUES (824, 24, 'Ospina', 52506);
INSERT INTO ciudades VALUES (825, 24, 'Pasto', 52001);
INSERT INTO ciudades VALUES (826, 24, 'Policarpa', 52540);
INSERT INTO ciudades VALUES (827, 24, 'Potosi', 52560);
INSERT INTO ciudades VALUES (828, 24, 'Providencia', 52565);
INSERT INTO ciudades VALUES (829, 24, 'Puerres', 52573);
INSERT INTO ciudades VALUES (830, 24, 'Pupiales', 52585);
INSERT INTO ciudades VALUES (831, 24, 'Ricaurte', 52612);
INSERT INTO ciudades VALUES (832, 24, 'Roberto Payan (San Jose)', 52621);
INSERT INTO ciudades VALUES (833, 24, 'Samaniego', 52678);
INSERT INTO ciudades VALUES (834, 24, 'San Bernardo', 52685);
INSERT INTO ciudades VALUES (835, 24, 'San Lorenzo', 52687);
INSERT INTO ciudades VALUES (836, 24, 'San Pablo', 52693);
INSERT INTO ciudades VALUES (837, 24, 'San Pedro de Cartago', 52694);
INSERT INTO ciudades VALUES (838, 24, 'Sandona', 52683);
INSERT INTO ciudades VALUES (839, 24, 'Santa Barbara (Iscuande)', 52696);
INSERT INTO ciudades VALUES (840, 24, 'Santa Cruz (Guachaves)', 52699);
INSERT INTO ciudades VALUES (841, 24, 'Sapuyes', 52720);
INSERT INTO ciudades VALUES (842, 24, 'Taminango', 52786);
INSERT INTO ciudades VALUES (843, 24, 'Tangua', 52788);
INSERT INTO ciudades VALUES (844, 24, 'Tumaco', 52835);
INSERT INTO ciudades VALUES (845, 24, 'Tuquerres', 52838);
INSERT INTO ciudades VALUES (846, 24, 'Yacuanquer', 52885);
INSERT INTO ciudades VALUES (848, 25, 'Abrego', 54003);
INSERT INTO ciudades VALUES (849, 25, 'Arboledas', 54051);
INSERT INTO ciudades VALUES (850, 25, 'Bochalema', 54099);
INSERT INTO ciudades VALUES (851, 25, 'Bucarasica', 54109);
INSERT INTO ciudades VALUES (852, 25, 'Cachira', 54128);
INSERT INTO ciudades VALUES (853, 25, 'Cacota', 54125);
INSERT INTO ciudades VALUES (854, 25, 'Chinacota', 54172);
INSERT INTO ciudades VALUES (855, 25, 'Chitaga', 54174);
INSERT INTO ciudades VALUES (856, 25, 'Convencion', 54206);
INSERT INTO ciudades VALUES (857, 25, 'Cucuta', 54001);
INSERT INTO ciudades VALUES (858, 25, 'Cucutilla', 54223);
INSERT INTO ciudades VALUES (859, 25, 'Durania', 54239);
INSERT INTO ciudades VALUES (860, 25, 'El Carmen', 54245);
INSERT INTO ciudades VALUES (861, 25, 'El Tarra', 54250);
INSERT INTO ciudades VALUES (862, 25, 'El Zulia', 54261);
INSERT INTO ciudades VALUES (863, 25, 'Gramalote', 54313);
INSERT INTO ciudades VALUES (864, 25, 'Hacari', 54344);
INSERT INTO ciudades VALUES (865, 25, 'Herran', 54347);
INSERT INTO ciudades VALUES (866, 25, 'La Esperanza', 54385);
INSERT INTO ciudades VALUES (867, 25, 'La Playa', 54398);
INSERT INTO ciudades VALUES (868, 25, 'Labateca', 54377);
INSERT INTO ciudades VALUES (869, 25, 'Los Patios', 54405);
INSERT INTO ciudades VALUES (870, 25, 'Lourdes', 54418);
INSERT INTO ciudades VALUES (871, 25, 'Mutiscua', 54480);
INSERT INTO ciudades VALUES (872, 25, 'OcaÃ±a', 54498);
INSERT INTO ciudades VALUES (873, 25, 'Pamplona', 54518);
INSERT INTO ciudades VALUES (874, 25, 'Pamplonita', 54520);
INSERT INTO ciudades VALUES (875, 25, 'Puerto Santander', 54553);
INSERT INTO ciudades VALUES (876, 25, 'Ragonvalia', 54599);
INSERT INTO ciudades VALUES (877, 25, 'Salazar', 54660);
INSERT INTO ciudades VALUES (878, 25, 'San Calixto', 54670);
INSERT INTO ciudades VALUES (879, 25, 'San Cayetano', 54673);
INSERT INTO ciudades VALUES (880, 25, 'Santiago', 54680);
INSERT INTO ciudades VALUES (881, 25, 'Sardinata', 54720);
INSERT INTO ciudades VALUES (882, 25, 'Silos', 54743);
INSERT INTO ciudades VALUES (883, 25, 'Teorama', 54800);
INSERT INTO ciudades VALUES (884, 25, 'Tibu', 54810);
INSERT INTO ciudades VALUES (885, 25, 'Toledo', 54820);
INSERT INTO ciudades VALUES (886, 25, 'Villa Caro', 54871);
INSERT INTO ciudades VALUES (887, 25, 'Villa del Rosario', 54874);
INSERT INTO ciudades VALUES (889, 26, 'Colon', 86219);
INSERT INTO ciudades VALUES (890, 26, 'Mocoa', 86001);
INSERT INTO ciudades VALUES (891, 26, 'Orito', 86320);
INSERT INTO ciudades VALUES (892, 26, 'Puerto Asis', 86568);
INSERT INTO ciudades VALUES (893, 26, 'Puerto Caicedo', 86569);
INSERT INTO ciudades VALUES (894, 26, 'Puerto Guzman', 86571);
INSERT INTO ciudades VALUES (895, 26, 'Puerto Leguizamo', 86573);
INSERT INTO ciudades VALUES (782, 24, 'NariÃ±o. Mpio. Desconocido', 52000);
INSERT INTO ciudades VALUES (888, 26, 'Putumayo. Mpio. Desconocido', 86000);
INSERT INTO ciudades VALUES (896, 26, 'San Francisco', 86755);
INSERT INTO ciudades VALUES (897, 26, 'San Miguel (La Dorada)', 86757);
INSERT INTO ciudades VALUES (898, 26, 'Santiago', 86760);
INSERT INTO ciudades VALUES (899, 26, 'Sibundoy', 86749);
INSERT INTO ciudades VALUES (900, 26, 'Valle del Guamuez', 86865);
INSERT INTO ciudades VALUES (901, 26, 'Villagarzon', 86885);
INSERT INTO ciudades VALUES (903, 27, 'Armenia', 63001);
INSERT INTO ciudades VALUES (904, 27, 'Buenavista', 63111);
INSERT INTO ciudades VALUES (905, 27, 'Calarca', 63130);
INSERT INTO ciudades VALUES (906, 27, 'Circasia', 63190);
INSERT INTO ciudades VALUES (907, 27, 'Cordoba', 63212);
INSERT INTO ciudades VALUES (908, 27, 'Filandia', 63272);
INSERT INTO ciudades VALUES (909, 27, 'Genova', 63302);
INSERT INTO ciudades VALUES (910, 27, 'La Tebaida', 63401);
INSERT INTO ciudades VALUES (911, 27, 'Montenegro', 63470);
INSERT INTO ciudades VALUES (912, 27, 'Pijao', 63548);
INSERT INTO ciudades VALUES (913, 27, 'Quimbaya', 63594);
INSERT INTO ciudades VALUES (914, 27, 'Salento', 63690);
INSERT INTO ciudades VALUES (916, 28, 'Apia', 66045);
INSERT INTO ciudades VALUES (917, 28, 'Balboa', 66075);
INSERT INTO ciudades VALUES (918, 28, 'Belen de Umbria', 66088);
INSERT INTO ciudades VALUES (919, 28, 'Dosquebradas', 66170);
INSERT INTO ciudades VALUES (920, 28, 'Guatica', 66318);
INSERT INTO ciudades VALUES (921, 28, 'La Celia', 66383);
INSERT INTO ciudades VALUES (922, 28, 'La Virginia', 66400);
INSERT INTO ciudades VALUES (923, 28, 'Marsella', 66440);
INSERT INTO ciudades VALUES (924, 28, 'Mistrato', 66456);
INSERT INTO ciudades VALUES (925, 28, 'Pereira', 66001);
INSERT INTO ciudades VALUES (926, 28, 'Pueblo Rico', 66572);
INSERT INTO ciudades VALUES (927, 28, 'Quinchia', 66594);
INSERT INTO ciudades VALUES (928, 28, 'Santa Rosa de Cabal', 66682);
INSERT INTO ciudades VALUES (929, 28, 'Santuario', 66687);
INSERT INTO ciudades VALUES (931, 29, 'Providencia', 88564);
INSERT INTO ciudades VALUES (932, 29, 'San Andres', 88001);
INSERT INTO ciudades VALUES (933, 30, 'Santa Marta', 48001);
INSERT INTO ciudades VALUES (935, 31, 'Aguada', 68013);
INSERT INTO ciudades VALUES (936, 31, 'Albania', 68020);
INSERT INTO ciudades VALUES (937, 31, 'Aratoca', 68051);
INSERT INTO ciudades VALUES (938, 31, 'Barbosa', 68077);
INSERT INTO ciudades VALUES (939, 31, 'Barichara', 68079);
INSERT INTO ciudades VALUES (940, 31, 'Barrancabermeja', 68081);
INSERT INTO ciudades VALUES (941, 31, 'Betulia', 68092);
INSERT INTO ciudades VALUES (942, 31, 'Bolivar', 68101);
INSERT INTO ciudades VALUES (943, 31, 'Bucaramanga', 68001);
INSERT INTO ciudades VALUES (944, 31, 'Cabrera', 68121);
INSERT INTO ciudades VALUES (945, 31, 'California', 68132);
INSERT INTO ciudades VALUES (946, 31, 'Capitanejo', 68147);
INSERT INTO ciudades VALUES (947, 31, 'Carcasi', 68152);
INSERT INTO ciudades VALUES (948, 31, 'Cepita', 68160);
INSERT INTO ciudades VALUES (949, 31, 'Cerrito', 68162);
INSERT INTO ciudades VALUES (950, 31, 'Charala', 68167);
INSERT INTO ciudades VALUES (951, 31, 'Charta', 68169);
INSERT INTO ciudades VALUES (952, 31, 'Chima', 68176);
INSERT INTO ciudades VALUES (953, 31, 'Chipata', 68179);
INSERT INTO ciudades VALUES (954, 31, 'Cimitarra', 68190);
INSERT INTO ciudades VALUES (955, 31, 'Concepcion', 68207);
INSERT INTO ciudades VALUES (956, 31, 'Confines', 68209);
INSERT INTO ciudades VALUES (957, 31, 'Contratacion', 68211);
INSERT INTO ciudades VALUES (958, 31, 'Coromoro', 68217);
INSERT INTO ciudades VALUES (959, 31, 'Curiti', 68229);
INSERT INTO ciudades VALUES (960, 31, 'El Carmen de Chucuri', 68235);
INSERT INTO ciudades VALUES (961, 31, 'El Guacamayo', 68245);
INSERT INTO ciudades VALUES (962, 31, 'El PeÃ±on', 68250);
INSERT INTO ciudades VALUES (963, 31, 'El Playon', 68255);
INSERT INTO ciudades VALUES (964, 31, 'Encino', 68264);
INSERT INTO ciudades VALUES (965, 31, 'Enciso', 68266);
INSERT INTO ciudades VALUES (966, 31, 'Florian', 68271);
INSERT INTO ciudades VALUES (967, 31, 'Floridablanca', 68276);
INSERT INTO ciudades VALUES (968, 31, 'Galan', 68296);
INSERT INTO ciudades VALUES (969, 31, 'Gambita', 68298);
INSERT INTO ciudades VALUES (970, 31, 'Giron', 68307);
INSERT INTO ciudades VALUES (971, 31, 'Guaca', 68318);
INSERT INTO ciudades VALUES (972, 31, 'Guadalupe', 68320);
INSERT INTO ciudades VALUES (973, 31, 'Guapota', 68322);
INSERT INTO ciudades VALUES (974, 31, 'Guavata', 68324);
INSERT INTO ciudades VALUES (975, 31, 'Guepsa', 68327);
INSERT INTO ciudades VALUES (976, 31, 'Hato', 68344);
INSERT INTO ciudades VALUES (977, 31, 'Jesus Maria', 68368);
INSERT INTO ciudades VALUES (978, 31, 'Jordan', 68370);
INSERT INTO ciudades VALUES (979, 31, 'La Belleza', 68377);
INSERT INTO ciudades VALUES (980, 31, 'La Paz', 68397);
INSERT INTO ciudades VALUES (981, 31, 'Landazuri', 68385);
INSERT INTO ciudades VALUES (982, 31, 'Lebrija', 68406);
INSERT INTO ciudades VALUES (983, 31, 'Los Santos', 68418);
INSERT INTO ciudades VALUES (984, 31, 'Macaravita', 68425);
INSERT INTO ciudades VALUES (985, 31, 'Malaga', 68432);
INSERT INTO ciudades VALUES (986, 31, 'Matanza', 68444);
INSERT INTO ciudades VALUES (987, 31, 'Mogotes', 68464);
INSERT INTO ciudades VALUES (988, 31, 'Molagavita', 68468);
INSERT INTO ciudades VALUES (989, 31, 'Ocamonte', 68498);
INSERT INTO ciudades VALUES (990, 31, 'Oiba', 68500);
INSERT INTO ciudades VALUES (991, 31, 'Onzaga', 68502);
INSERT INTO ciudades VALUES (992, 31, 'Palmar', 68522);
INSERT INTO ciudades VALUES (993, 31, 'Palmas Socorro', 68524);
INSERT INTO ciudades VALUES (994, 31, 'Paramo', 68533);
INSERT INTO ciudades VALUES (995, 31, 'Piedecuesta', 68547);
INSERT INTO ciudades VALUES (996, 31, 'Pinchote', 68549);
INSERT INTO ciudades VALUES (997, 31, 'Puente Nacional', 68572);
INSERT INTO ciudades VALUES (998, 31, 'Puerto Parra', 68573);
INSERT INTO ciudades VALUES (999, 31, 'Puerto Wilches', 68575);
INSERT INTO ciudades VALUES (1000, 31, 'Rionegro', 68615);
INSERT INTO ciudades VALUES (1001, 31, 'Sabana de Torres', 68655);
INSERT INTO ciudades VALUES (1002, 31, 'San Andres', 68669);
INSERT INTO ciudades VALUES (1003, 31, 'San Benito', 68673);
INSERT INTO ciudades VALUES (1004, 31, 'San Gil', 68679);
INSERT INTO ciudades VALUES (1005, 31, 'San Joaquin', 68682);
INSERT INTO ciudades VALUES (1006, 31, 'San Jose de Miranda', 68684);
INSERT INTO ciudades VALUES (1007, 31, 'San Miguel', 68686);
INSERT INTO ciudades VALUES (1008, 31, 'San Vicente de Chucuri', 68689);
INSERT INTO ciudades VALUES (1009, 31, 'Santa Barbara', 68705);
INSERT INTO ciudades VALUES (1010, 31, 'Santa Helena del Opon', 68720);
INSERT INTO ciudades VALUES (1011, 31, 'Simacota', 68745);
INSERT INTO ciudades VALUES (1012, 31, 'Socorro', 68755);
INSERT INTO ciudades VALUES (1013, 31, 'Suaita', 68770);
INSERT INTO ciudades VALUES (1014, 31, 'Sucre', 68773);
INSERT INTO ciudades VALUES (1015, 31, 'Surata', 68780);
INSERT INTO ciudades VALUES (1016, 31, 'Tona', 68820);
INSERT INTO ciudades VALUES (1017, 31, 'Valle de San Jose', 68855);
INSERT INTO ciudades VALUES (1018, 31, 'Velez', 68861);
INSERT INTO ciudades VALUES (1019, 31, 'Vetas', 68867);
INSERT INTO ciudades VALUES (1020, 31, 'Villanueva', 68872);
INSERT INTO ciudades VALUES (1021, 31, 'Zapatoca', 68895);
INSERT INTO ciudades VALUES (1023, 32, 'Buenavista', 70110);
INSERT INTO ciudades VALUES (1024, 32, 'Caimito', 70124);
INSERT INTO ciudades VALUES (1025, 32, 'Chalan', 70230);
INSERT INTO ciudades VALUES (1026, 32, 'Coloso (Ricaurte)', 70204);
INSERT INTO ciudades VALUES (1027, 32, 'Corozal', 70215);
INSERT INTO ciudades VALUES (1028, 32, 'CoveÃ±as', 70221);
INSERT INTO ciudades VALUES (1029, 32, 'El Roble', 70233);
INSERT INTO ciudades VALUES (1030, 32, 'Galeras (Nueva Granada)', 70235);
INSERT INTO ciudades VALUES (1031, 32, 'Guaranda', 70265);
INSERT INTO ciudades VALUES (1032, 32, 'La Union', 70400);
INSERT INTO ciudades VALUES (1033, 32, 'Los Palmitos', 70418);
INSERT INTO ciudades VALUES (1034, 32, 'Majagual', 70429);
INSERT INTO ciudades VALUES (1035, 32, 'Morroa', 70473);
INSERT INTO ciudades VALUES (1036, 32, 'Ovejas', 70508);
INSERT INTO ciudades VALUES (1037, 32, 'Palmito', 70523);
INSERT INTO ciudades VALUES (1038, 32, 'Sampues', 70670);
INSERT INTO ciudades VALUES (1039, 32, 'San Benito Abad', 70678);
INSERT INTO ciudades VALUES (1040, 32, 'San Juan de Betulia', 70702);
INSERT INTO ciudades VALUES (915, 28, 'Risaralda. Mpio. Desconocido', 66000);
INSERT INTO ciudades VALUES (930, 29, 'San Andres y Pr. Mpio. Desc.', 88000);
INSERT INTO ciudades VALUES (934, 31, 'Santander. Mpio. Desconocido', 68000);
INSERT INTO ciudades VALUES (1022, 32, 'Sucre. Mpio. Desconocido', 70000);
INSERT INTO ciudades VALUES (1041, 32, 'San Marcos', 70708);
INSERT INTO ciudades VALUES (1042, 32, 'San Onofre', 70713);
INSERT INTO ciudades VALUES (1043, 32, 'San Pedro', 70717);
INSERT INTO ciudades VALUES (1044, 32, 'Since', 70742);
INSERT INTO ciudades VALUES (1045, 32, 'Sincelejo', 70001);
INSERT INTO ciudades VALUES (1046, 32, 'Sucre', 70771);
INSERT INTO ciudades VALUES (1047, 32, 'Tolu', 70820);
INSERT INTO ciudades VALUES (1048, 32, 'Toluviejo', 70823);
INSERT INTO ciudades VALUES (1050, 33, 'Alpujarra', 73024);
INSERT INTO ciudades VALUES (1051, 33, 'Alvarado', 73026);
INSERT INTO ciudades VALUES (1052, 33, 'Ambalema', 73030);
INSERT INTO ciudades VALUES (1053, 33, 'Anzoategui', 73043);
INSERT INTO ciudades VALUES (1054, 33, 'Armero (Guayabal)', 73055);
INSERT INTO ciudades VALUES (1055, 33, 'Ataco', 73067);
INSERT INTO ciudades VALUES (1056, 33, 'Cajamarca', 73124);
INSERT INTO ciudades VALUES (1057, 33, 'Carmen de Apicala', 73148);
INSERT INTO ciudades VALUES (1058, 33, 'Casabianca', 73152);
INSERT INTO ciudades VALUES (1059, 33, 'Chaparral', 73168);
INSERT INTO ciudades VALUES (1060, 33, 'Coello', 73200);
INSERT INTO ciudades VALUES (1061, 33, 'Coyaima', 73217);
INSERT INTO ciudades VALUES (1062, 33, 'Cunday', 73226);
INSERT INTO ciudades VALUES (1063, 33, 'Dolores', 73236);
INSERT INTO ciudades VALUES (1064, 33, 'Espinal', 73268);
INSERT INTO ciudades VALUES (1065, 33, 'Falan', 73270);
INSERT INTO ciudades VALUES (1066, 33, 'Flandes', 73275);
INSERT INTO ciudades VALUES (1067, 33, 'Fresno', 73283);
INSERT INTO ciudades VALUES (1068, 33, 'Guamo', 73319);
INSERT INTO ciudades VALUES (1069, 33, 'Herveo', 73347);
INSERT INTO ciudades VALUES (1070, 33, 'Honda', 73349);
INSERT INTO ciudades VALUES (1071, 33, 'Ibague', 73001);
INSERT INTO ciudades VALUES (1072, 33, 'Icononzo', 73352);
INSERT INTO ciudades VALUES (1073, 33, 'Lerida', 73408);
INSERT INTO ciudades VALUES (1074, 33, 'Libano', 73411);
INSERT INTO ciudades VALUES (1075, 33, 'Mariquita', 73443);
INSERT INTO ciudades VALUES (1076, 33, 'Melgar', 73449);
INSERT INTO ciudades VALUES (1077, 33, 'Murillo', 73461);
INSERT INTO ciudades VALUES (1078, 33, 'Natagaima', 73483);
INSERT INTO ciudades VALUES (1079, 33, 'Ortega', 73504);
INSERT INTO ciudades VALUES (1080, 33, 'Palocabildo', 73520);
INSERT INTO ciudades VALUES (1081, 33, 'Piedras', 73547);
INSERT INTO ciudades VALUES (1082, 33, 'Planadas', 73555);
INSERT INTO ciudades VALUES (1083, 33, 'Prado', 73563);
INSERT INTO ciudades VALUES (1084, 33, 'Purificacion', 73585);
INSERT INTO ciudades VALUES (1085, 33, 'Rioblanco', 73616);
INSERT INTO ciudades VALUES (1086, 33, 'Roncesvalles', 73622);
INSERT INTO ciudades VALUES (1087, 33, 'Rovira', 73624);
INSERT INTO ciudades VALUES (1088, 33, 'SaldaÃ±a', 73671);
INSERT INTO ciudades VALUES (1089, 33, 'San Antonio', 73675);
INSERT INTO ciudades VALUES (1090, 33, 'San Luis', 73678);
INSERT INTO ciudades VALUES (1091, 33, 'Santa Isabel', 73686);
INSERT INTO ciudades VALUES (1092, 33, 'Suarez', 73770);
INSERT INTO ciudades VALUES (1093, 33, 'Valle de San Juan', 73854);
INSERT INTO ciudades VALUES (1094, 33, 'Venadillo', 73861);
INSERT INTO ciudades VALUES (1095, 33, 'Villahermosa', 73870);
INSERT INTO ciudades VALUES (1096, 33, 'Villarica', 73873);
INSERT INTO ciudades VALUES (1098, 34, 'Alcala', 76020);
INSERT INTO ciudades VALUES (1099, 34, 'Andalucia', 76036);
INSERT INTO ciudades VALUES (1100, 34, 'Ansermanuevo', 76041);
INSERT INTO ciudades VALUES (1101, 34, 'Argelia', 76054);
INSERT INTO ciudades VALUES (1102, 34, 'Bolivar', 76100);
INSERT INTO ciudades VALUES (1103, 34, 'Buenaventura', 76109);
INSERT INTO ciudades VALUES (1104, 34, 'Buga', 76111);
INSERT INTO ciudades VALUES (1105, 34, 'Bugalagrande', 76113);
INSERT INTO ciudades VALUES (1106, 34, 'Caicedonia', 76122);
INSERT INTO ciudades VALUES (1107, 34, 'Cali', 76001);
INSERT INTO ciudades VALUES (1108, 34, 'Candelaria', 76130);
INSERT INTO ciudades VALUES (1109, 34, 'Cartago', 76147);
INSERT INTO ciudades VALUES (1110, 34, 'Dagua', 76233);
INSERT INTO ciudades VALUES (1111, 34, 'Darien', 76126);
INSERT INTO ciudades VALUES (1112, 34, 'El Aguila', 76243);
INSERT INTO ciudades VALUES (1113, 34, 'El Cairo', 76246);
INSERT INTO ciudades VALUES (1114, 34, 'El Cerrito', 76248);
INSERT INTO ciudades VALUES (1115, 34, 'El Dovio', 76250);
INSERT INTO ciudades VALUES (1116, 34, 'Florida', 76275);
INSERT INTO ciudades VALUES (1117, 34, 'Ginebra', 76306);
INSERT INTO ciudades VALUES (1118, 34, 'Guacari', 76318);
INSERT INTO ciudades VALUES (1119, 34, 'Jamundi', 76364);
INSERT INTO ciudades VALUES (1120, 34, 'La Cumbre', 76377);
INSERT INTO ciudades VALUES (1121, 34, 'La Union', 76400);
INSERT INTO ciudades VALUES (1122, 34, 'La Victoria', 76403);
INSERT INTO ciudades VALUES (1123, 34, 'Obando', 76497);
INSERT INTO ciudades VALUES (1124, 34, 'Palmira', 76520);
INSERT INTO ciudades VALUES (1125, 34, 'Pradera', 76563);
INSERT INTO ciudades VALUES (1126, 34, 'Restrepo', 76606);
INSERT INTO ciudades VALUES (1127, 34, 'Riofrio', 76616);
INSERT INTO ciudades VALUES (1128, 34, 'Roldanillo', 76622);
INSERT INTO ciudades VALUES (1129, 34, 'San Pedro', 76670);
INSERT INTO ciudades VALUES (1130, 34, 'Sevilla', 76736);
INSERT INTO ciudades VALUES (1131, 34, 'Toro', 76823);
INSERT INTO ciudades VALUES (1132, 34, 'Trujillo', 76828);
INSERT INTO ciudades VALUES (1133, 34, 'Tulua', 76834);
INSERT INTO ciudades VALUES (1134, 34, 'Ulloa', 76845);
INSERT INTO ciudades VALUES (1135, 34, 'Versalles', 76863);
INSERT INTO ciudades VALUES (1136, 34, 'Vijes', 76869);
INSERT INTO ciudades VALUES (1137, 34, 'Yotoco', 76890);
INSERT INTO ciudades VALUES (1138, 34, 'Yumbo', 76892);
INSERT INTO ciudades VALUES (1139, 34, 'Zarzal', 76895);
INSERT INTO ciudades VALUES (1141, 35, 'Caruru', 97161);
INSERT INTO ciudades VALUES (1142, 35, 'Mitu', 97001);
INSERT INTO ciudades VALUES (1143, 35, 'Pacoa (CD)', 97511);
INSERT INTO ciudades VALUES (1144, 35, 'Papunaua (Morichal) (CD)', 97777);
INSERT INTO ciudades VALUES (1145, 35, 'Taraira', 97666);
INSERT INTO ciudades VALUES (1146, 35, 'Yavarate (CD)', 97889);
INSERT INTO ciudades VALUES (1148, 36, 'Cumaribo', 99773);
INSERT INTO ciudades VALUES (1149, 36, 'La Primavera', 99524);
INSERT INTO ciudades VALUES (1150, 36, 'Puerto CarreÃ±o', 99001);
INSERT INTO ciudades VALUES (1151, 36, 'Santa Rosalia', 99624);
INSERT INTO ciudades VALUES (139, 3, 'Arauca', 81000);
INSERT INTO ciudades VALUES (172, 7, 'Bolivar. Mpio. Desconocido', 13000);
INSERT INTO ciudades VALUES (341, 9, 'Caldas. Mpio. Desconocido', 17000);
INSERT INTO ciudades VALUES (475, 15, 'Choco. Mpio. Desconocido', 27000);
INSERT INTO ciudades VALUES (653, 18, 'Guainia. Mpio. Desconocido', 94000);
INSERT INTO ciudades VALUES (722, 22, 'Magdalena. Mpio. Desconocido', 47000);
INSERT INTO ciudades VALUES (752, 23, 'Meta. Mpio. Desconocido', 50000);
INSERT INTO ciudades VALUES (847, 25, 'Norte Santander. Mpio. Desc.', 54000);
INSERT INTO ciudades VALUES (902, 27, 'Quindio. Mpio. Desconocido', 63000);
INSERT INTO ciudades VALUES (1049, 33, 'Tolima. Mpio. Desconocido', 73000);
INSERT INTO ciudades VALUES (1097, 34, 'Valle. Mpio. Desconocido', 76000);
INSERT INTO ciudades VALUES (1140, 35, 'Vaupes. Mpio. Desconocido', 97000);
INSERT INTO ciudades VALUES (1147, 36, 'Vichada. Mpio. Desconocido', 99000);
INSERT INTO ciudades VALUES (2, 1, 'El Encanto (CD)', 91263);


--
-- Data for Name: comisiones; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: departamentos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO departamentos VALUES (1, 'AMAZONAS', 91);
INSERT INTO departamentos VALUES (2, 'ANTIOQUIA', 5);
INSERT INTO departamentos VALUES (3, 'ARAUCA', 81);
INSERT INTO departamentos VALUES (4, 'ATLÃNTICO', 8);
INSERT INTO departamentos VALUES (5, 'BARRANQUILLA', 9);
INSERT INTO departamentos VALUES (6, 'BOGOTÃ D.C.', 11);
INSERT INTO departamentos VALUES (7, 'BOLÃVAR', 13);
INSERT INTO departamentos VALUES (8, 'BOYACÃ', 15);
INSERT INTO departamentos VALUES (9, 'CALDAS', 17);
INSERT INTO departamentos VALUES (10, 'CAQUETÃ', 18);
INSERT INTO departamentos VALUES (11, 'CARTAGENA', 14);
INSERT INTO departamentos VALUES (12, 'CASANARE', 85);
INSERT INTO departamentos VALUES (13, 'CAUCA', 19);
INSERT INTO departamentos VALUES (14, 'CESAR', 20);
INSERT INTO departamentos VALUES (15, 'CHOCÃ“', 27);
INSERT INTO departamentos VALUES (16, 'CÃ“RDOBA', 23);
INSERT INTO departamentos VALUES (17, 'CUNDINAMARCA', 25);
INSERT INTO departamentos VALUES (18, 'GUAINÃA', 94);
INSERT INTO departamentos VALUES (19, 'GUAVIARE', 95);
INSERT INTO departamentos VALUES (20, 'HUILA', 41);
INSERT INTO departamentos VALUES (21, 'LA GUAJIRA', 44);
INSERT INTO departamentos VALUES (22, 'MAGDALENA', 47);
INSERT INTO departamentos VALUES (23, 'META', 50);
INSERT INTO departamentos VALUES (24, 'NARIÃ‘O', 52);
INSERT INTO departamentos VALUES (25, 'NORTE DE SANTANDER', 54);
INSERT INTO departamentos VALUES (26, 'PUTUMAYO', 86);
INSERT INTO departamentos VALUES (27, 'QUINDIO', 63);
INSERT INTO departamentos VALUES (28, 'RISARALDA', 66);
INSERT INTO departamentos VALUES (29, 'SAN ANDRÃ‰S', 88);
INSERT INTO departamentos VALUES (30, 'SANTA MARTA', 48);
INSERT INTO departamentos VALUES (31, 'SANTANDER', 68);
INSERT INTO departamentos VALUES (32, 'SUCRE', 70);
INSERT INTO departamentos VALUES (33, 'TOLIMA', 73);
INSERT INTO departamentos VALUES (34, 'VALLE', 76);
INSERT INTO departamentos VALUES (35, 'VAUPÃ‰S', 97);
INSERT INTO departamentos VALUES (36, 'VICHADA', 99);


--
-- Data for Name: detallecomisiones; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: detalledocumentos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: detalleventas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: documentos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: empresa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO empresa VALUES (1, 'PANELAS DE COLOMBIA', 900524372534, 'PANELAS@GMAIL.COM', 'CALLE FALSA 123', 171, 'MARTHA PALACIOS', 'images/images_shop/1393277916.jpg', 'panelas para el mundo', '', 'distribucion de productos', 'www.panelasdecolombia.com', 7767002);


--
-- Data for Name: estados; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO estados VALUES (1, 'inactivo');
INSERT INTO estados VALUES (2, 'activo');
INSERT INTO estados VALUES (3, 'en espera');


--
-- Data for Name: facturaventas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: imagenes; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO imagenes VALUES (1, 'Imagen por defecto', 'images/imgnodisponible.png');


--
-- Data for Name: localidades; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO localidades VALUES (1, 'USAQUEN', 1);
INSERT INTO localidades VALUES (2, 'CHAPINERO', 1);
INSERT INTO localidades VALUES (3, 'SANTA FE', 1);
INSERT INTO localidades VALUES (4, 'SAN CRISTOBAL', 1);
INSERT INTO localidades VALUES (5, 'USME', 1);
INSERT INTO localidades VALUES (6, 'TUNJUELITO', 1);
INSERT INTO localidades VALUES (7, 'BOSA', 1);
INSERT INTO localidades VALUES (8, 'KENNEDY', 1);
INSERT INTO localidades VALUES (9, 'FONTIBON', 1);
INSERT INTO localidades VALUES (10, 'ENGATIVA', 1);
INSERT INTO localidades VALUES (11, 'SUBA', 1);
INSERT INTO localidades VALUES (12, 'BARRIOS UNIDOS', 1);
INSERT INTO localidades VALUES (13, 'TEUSAQUILLO', 1);
INSERT INTO localidades VALUES (14, 'MARTIRES', 1);
INSERT INTO localidades VALUES (15, 'ANTONIO NARLÃ‘O', 1);
INSERT INTO localidades VALUES (16, 'PUENTE ARANDA', 1);
INSERT INTO localidades VALUES (17, 'CANDELARIA', 1);
INSERT INTO localidades VALUES (18, 'RAFAEL URIBE ', 1);
INSERT INTO localidades VALUES (19, 'CIUDAD BOLIVAR', 1);


--
-- Data for Name: menus; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO menus VALUES (4, 'Reportes', 'index.php?controlador=Index&accion=Logo');
INSERT INTO menus VALUES (2, 'Administración', 'index.php?controlador=Index&accion=Logo');


--
-- Data for Name: movimientos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: perfiles; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO perfiles VALUES (1, 'superadministrador', 'Superadministrador');
INSERT INTO perfiles VALUES (21, 'Administrador 1', 'Administrador');


--
-- Data for Name: perfiles_permisos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO perfiles_permisos VALUES (126, 1, 11);
INSERT INTO perfiles_permisos VALUES (127, 1, 8);
INSERT INTO perfiles_permisos VALUES (128, 1, 12);
INSERT INTO perfiles_permisos VALUES (129, 1, 13);
INSERT INTO perfiles_permisos VALUES (130, 1, 14);
INSERT INTO perfiles_permisos VALUES (131, 21, 11);
INSERT INTO perfiles_permisos VALUES (132, 21, 12);
INSERT INTO perfiles_permisos VALUES (133, 21, 8);
INSERT INTO perfiles_permisos VALUES (134, 1, 30);
INSERT INTO perfiles_permisos VALUES (135, 1, 31);
INSERT INTO perfiles_permisos VALUES (136, 1, 32);
INSERT INTO perfiles_permisos VALUES (137, 1, 33);
INSERT INTO perfiles_permisos VALUES (138, 1, 34);
INSERT INTO perfiles_permisos VALUES (139, 1, 35);
INSERT INTO perfiles_permisos VALUES (140, 1, 36);
INSERT INTO perfiles_permisos VALUES (141, 1, 37);
INSERT INTO perfiles_permisos VALUES (142, 1, 38);
INSERT INTO perfiles_permisos VALUES (143, 1, 41);
INSERT INTO perfiles_permisos VALUES (144, 1, 45);
INSERT INTO perfiles_permisos VALUES (145, 1, 40);
INSERT INTO perfiles_permisos VALUES (146, 1, 39);


--
-- Data for Name: periodos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO periodos VALUES (18, '2013-09-01', '2013-09-30', 'SEPTIEMBRE 2013');
INSERT INTO periodos VALUES (19, '2013-10-01', '2013-10-31', 'OCTUBRE 2013');
INSERT INTO periodos VALUES (20, '2013-11-01', '2013-11-30', 'NOVIEMBRE 2013');
INSERT INTO periodos VALUES (17, '2013-08-01', '2013-08-31', 'AGOSTO 2013');


--
-- Data for Name: periodosventa; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO periodosventa VALUES (1, 2013);
INSERT INTO periodosventa VALUES (2, 2014);


--
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO productos VALUES (3109, 45, 'PANELA EKONO 350G', 0, 1, 0, 'activo', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'und', 950, 40, 2526484675);
INSERT INTO productos VALUES (3107, 45, 'PANELA EKONO 500GR', 4.75, 1, 0, 'activo', 5700, 5700, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'und', 500, 15, 7709890001129);
INSERT INTO productos VALUES (3106, 44, 'ANCHETA 2', 5.2994666666667003, 1, 12, 'activo', 5678, 6359.3599999999997, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'und', NULL, 20, 7701007767841);
INSERT INTO productos VALUES (3108, 44, 'TELEVISOR LCD', 416.66666666666998, 1, 0, 'activo', 500000, 500000, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'und', 10000, 20, 7734737373);
INSERT INTO productos VALUES (3104, 43, 'UVA CHILENA', 2.1333333333333, 1, 0, 'activo', 2560, 2560, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 100, 'und', 400, 20, 9801001067841);


--
-- Data for Name: productosproveedores; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: remisiones; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: resolucionfacturas; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: saldoinventario; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO saldoinventario VALUES (1, 3104, 25, 12, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (2, 3109, 25, 32, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (3, 3107, 25, 42, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (4, 3108, 25, 23, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (5, 3106, 25, 523, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (6, 3104, 23, 1, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (7, 3109, 23, 12, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (8, 3107, 23, 2, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (9, 3108, 23, 41, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');
INSERT INTO saldoinventario VALUES (10, 3106, 23, 3, 2345, '2014-01-01', '2014-03-21 17:25:06', 'saldos inventario.xlsx');


--
-- Data for Name: submenus; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO submenus VALUES (11, 2, 'Productos', 'index.php?controlador=Products', 'images/imagenes-menu/products.png');
INSERT INTO submenus VALUES (12, 2, 'Clientes', 'index.php?controlador=Suppliers', 'images/imagenes-menu/proveedores.png');
INSERT INTO submenus VALUES (14, 2, 'Perfiles', 'index.php?controlador=Profiles', 'images/imagenes-menu/profiles.png');
INSERT INTO submenus VALUES (13, 2, 'Usuarios', 'index.php?controlador=ManageUsers', 'images/imagenes-menu/managerusers.png');
INSERT INTO submenus VALUES (8, 2, 'Tiendas', 'index.php?controlador=Warehouse', 'images/imagenes-menu/warehouse.png');
INSERT INTO submenus VALUES (30, 2, 'Cargar Ventas', 'index.php?controlador=LoadSales', 'images/imagenes-menu/cargaventas.png');
INSERT INTO submenus VALUES (31, 4, 'Reporte de precios', 'index.php?controlador=ReportPrice', 'images/imagenes-menu/reporteprecios.png');
INSERT INTO submenus VALUES (32, 4, 'Reporte anual de ventas', 'index.php?controlador=Reportyear', 'images/imagenes-menu/reporteanual.png');
INSERT INTO submenus VALUES (34, 2, 'Configuracion general', 'index.php?controlador=ConfGeneral', 'images/imagenes-menu/configuraciongeneral.png');
INSERT INTO submenus VALUES (33, 4, 'Reporte de ventas', 'index.php?controlador=ReportSales', 'images/imagenes-menu/reporteventas.png');
INSERT INTO submenus VALUES (35, 4, 'Productos sin rotaci&oacute;n', 'index.php?controlador=ReportNoRotate', 'images/imagenes-menu/productossinrotacion.png');
INSERT INTO submenus VALUES (36, 4, 'Ventas de mayor a menor', 'index.php?controlador=ReportUpToDown', 'images/imagenes-menu/reportemayormenor.png');
INSERT INTO submenus VALUES (37, 2, 'Cargar saldos', 'index.php?controlador=Saldos', 'images/imagenes-menu/cargasaldos.png');
INSERT INTO submenus VALUES (38, 4, 'Reporte saldos', 'index.php?controlador=ReportSaldos', 'images/imagenes-menu/reportesaldos.png');
INSERT INTO submenus VALUES (41, 4, 'Reporte comparativo', 'index.php?controlador=ReportComparative', 'images/imagenes-menu/reportecompa.png');
INSERT INTO submenus VALUES (45, 4, 'Reporte comparativo Marcas', 'index.php?controlador=ReportComparativeBrand', 'images/imagenes-menu/reportecompa2.png');
INSERT INTO submenus VALUES (40, 4, 'Reporte de tiendas comparativo (Productos)', 'index.php?controlador=ReportComparativeStore', 'images/imagenes-menu/reportecompastore.png');
INSERT INTO submenus VALUES (39, 4, 'Reporte de tiendas comparativo (Marcas)', 'index.php?controlador=ReportComparativeStoreBrand', 'images/imagenes-menu/reportecompastore2.png');


--
-- Data for Name: terceros; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO terceros VALUES (35, 'JHON ALEXANDER CARDENAS', 'Cra 36 c drtb dsf dff dfs', 6987645, 1076567890, 171, 9321098791, 'JOH CARDENAS', 'davidtechnics7140504@hotmail.com', 5423423442, '2012-06-13', 23423234);
INSERT INTO terceros VALUES (44, 'LEY (NIZA)', 'asdjkh 23j4h 234', NULL, 1239871293712, 171, NULL, NULL, 'davidcinho89@gmail.com', NULL, '2013-11-26', 12341234);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO usuarios VALUES (3, 2, 1, 'administrador', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', NULL, 'correo@gmail.com', '', 'ADMINISTRADOR');
INSERT INTO usuarios VALUES (384, 2, 21, 'ASDASDASD', 'eb2a9c412b5e91abb8a0c111921f478ba51da0ed', '2013-11-22', 'davidtechnics7140504@hotmail.com', '', 'MARIA DEL MAR');


--
-- Data for Name: vencimientoproductos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Data for Name: ventas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO ventas VALUES (306, 4500.2299999999996, 'carga de datos_otro3.xlsx', 25, 3104, 15, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (307, 8000, 'carga de datos_otro3.xlsx', 23, 3104, 20, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (308, 9536.1200000000008, 'carga de datos_otro3.xlsx', 18, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (309, 4500.2299999999996, 'carga de datos_otro3.xlsx', 25, 3104, 15, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (310, 8000, 'carga de datos_otro3.xlsx', 23, 3104, 20, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (311, 9536.1200000000008, 'carga de datos_otro3.xlsx', 18, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (312, 4500.2299999999996, 'carga de datos_otro3.xlsx', 25, 3104, 15, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (313, 4220, 'carga de datos_otro3.xlsx', 23, 3104, 20, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (314, 9536.1200000000008, 'carga de datos_otro3.xlsx', 18, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (315, 4500.2299999999996, 'carga de datos_otro3.xlsx', 25, 3104, 15, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (316, 8000, 'carga de datos_otro3.xlsx', 23, 3104, 20, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (317, 9536.1200000000008, 'carga de datos_otro3.xlsx', 18, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (318, 4500.2299999999996, 'carga de datos_otro3.xlsx', 25, 3104, 15, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (319, 8000, 'carga de datos_otro3.xlsx', 23, 3104, 20, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (320, 9536.1200000000008, 'carga de datos_otro3.xlsx', 18, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (321, 9536.1200000000008, 'carga de datos_otro3.xlsx', 25, 3104, 50, NULL, '2014-01-31 16:38:45', '2014-01-04');
INSERT INTO ventas VALUES (322, 4500.2299999999996, 'carga de datos_otro5.xlsx', 25, 3109, 23, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (323, 8000, 'carga de datos_otro5.xlsx', 25, 3107, 45, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (324, 9536.1200000000008, 'carga de datos_otro5.xlsx', 25, 3104, 1234, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (325, 4500.2299999999996, 'carga de datos_otro5.xlsx', 25, 3106, 23, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (326, 8000, 'carga de datos_otro5.xlsx', 25, 3108, 156, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (327, 9536.1200000000008, 'carga de datos_otro5.xlsx', 25, 3109, 763, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (328, 4500.2299999999996, 'carga de datos_otro5.xlsx', 25, 3107, 231, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (329, 3900, 'carga de datos_otro5.xlsx', 25, 3104, 513, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (330, 4750, 'carga de datos_otro5.xlsx', 25, 3106, 276, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (331, 2300, 'carga de datos_otro5.xlsx', 25, 3108, 245, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (332, 4220, 'carga de datos_otro5.xlsx', 23, 3109, 452, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (333, 9536.1200000000008, 'carga de datos_otro5.xlsx', 23, 3107, 122, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (334, 4500.2299999999996, 'carga de datos_otro5.xlsx', 23, 3104, 89, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (335, 8000, 'carga de datos_otro5.xlsx', 23, 3106, 76, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (336, 9536.1200000000008, 'carga de datos_otro5.xlsx', 23, 3108, 513, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (337, 4500.2299999999996, 'carga de datos_otro5.xlsx', 23, 3109, 478, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (338, 8000, 'carga de datos_otro5.xlsx', 23, 3107, 142, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (339, 9536.1200000000008, 'carga de datos_otro5.xlsx', 23, 3104, 144, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (340, 9536.1200000000008, 'carga de datos_otro5.xlsx', 23, 3106, 199, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (341, 4500.2299999999996, 'carga de datos_otro5.xlsx', 23, 3108, 43, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (342, 8000, 'carga de datos_otro5.xlsx', 18, 3109, 98, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (343, 9536.1200000000008, 'carga de datos_otro5.xlsx', 18, 3107, 165, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (344, 4500.2299999999996, 'carga de datos_otro5.xlsx', 18, 3104, 111, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (345, 8000, 'carga de datos_otro5.xlsx', 18, 3106, 101, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (346, 9536.1200000000008, 'carga de datos_otro5.xlsx', 18, 3108, 167, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (347, 4500.2299999999996, 'carga de datos_otro5.xlsx', 18, 3109, 265, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (348, 3900, 'carga de datos_otro5.xlsx', 18, 3107, 871, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (349, 4750, 'carga de datos_otro5.xlsx', 18, 3104, 1099, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (350, 2300, 'carga de datos_otro5.xlsx', 18, 3106, 187, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (351, 4220, 'carga de datos_otro5.xlsx', 18, 3108, 569, NULL, '2014-03-25 15:44:04', '2014-01-01');
INSERT INTO ventas VALUES (352, 4500.2299999999996, 'carga de datos_otro6.xlsx', 25, 3109, 457, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (353, 8000, 'carga de datos_otro6.xlsx', 25, 3107, 171, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (354, 9536.1200000000008, 'carga de datos_otro6.xlsx', 25, 3104, 1137, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (355, 4500.2299999999996, 'carga de datos_otro6.xlsx', 25, 3106, 264, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (356, 8000, 'carga de datos_otro6.xlsx', 25, 3108, 1152, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (357, 9536.1200000000008, 'carga de datos_otro6.xlsx', 25, 3109, 167, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (358, 4500.2299999999996, 'carga de datos_otro6.xlsx', 25, 3107, 1340, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (359, 3900, 'carga de datos_otro6.xlsx', 25, 3104, 1015, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (360, 4750, 'carga de datos_otro6.xlsx', 25, 3106, 171, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (361, 2300, 'carga de datos_otro6.xlsx', 25, 3108, 1303, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (362, 4220, 'carga de datos_otro6.xlsx', 23, 3109, 350, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (363, 9536.1200000000008, 'carga de datos_otro6.xlsx', 23, 3107, 359, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (364, 4500.2299999999996, 'carga de datos_otro6.xlsx', 23, 3104, 480, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (365, 8000, 'carga de datos_otro6.xlsx', 23, 3106, 228, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (366, 9536.1200000000008, 'carga de datos_otro6.xlsx', 23, 3108, 1085, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (367, 4500.2299999999996, 'carga de datos_otro6.xlsx', 23, 3109, 1096, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (368, 8000, 'carga de datos_otro6.xlsx', 23, 3107, 418, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (369, 9536.1200000000008, 'carga de datos_otro6.xlsx', 23, 3104, 839, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (370, 9536.1200000000008, 'carga de datos_otro6.xlsx', 23, 3106, 168, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (371, 4500.2299999999996, 'carga de datos_otro6.xlsx', 23, 3108, 995, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (372, 8000, 'carga de datos_otro6.xlsx', 18, 3109, 1087, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (373, 9536.1200000000008, 'carga de datos_otro6.xlsx', 18, 3107, 1440, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (374, 4500.2299999999996, 'carga de datos_otro6.xlsx', 18, 3104, 383, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (375, 8000, 'carga de datos_otro6.xlsx', 18, 3106, 857, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (376, 9536.1200000000008, 'carga de datos_otro6.xlsx', 18, 3108, 229, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (377, 4500.2299999999996, 'carga de datos_otro6.xlsx', 18, 3109, 1250, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (378, 3900, 'carga de datos_otro6.xlsx', 18, 3107, 624, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (379, 4750, 'carga de datos_otro6.xlsx', 18, 3104, 560, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (380, 2300, 'carga de datos_otro6.xlsx', 18, 3106, 812, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (381, 4220, 'carga de datos_otro6.xlsx', 18, 3108, 1181, NULL, '2014-03-25 15:46:57', '2014-01-02');
INSERT INTO ventas VALUES (382, 4500.2299999999996, 'carga de datos_otro7.xlsx', 25, 3109, 1029, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (383, 8000, 'carga de datos_otro7.xlsx', 25, 3107, 850, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (384, 9536.1200000000008, 'carga de datos_otro7.xlsx', 25, 3104, 1466, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (385, 4500.2299999999996, 'carga de datos_otro7.xlsx', 25, 3106, 367, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (386, 8000, 'carga de datos_otro7.xlsx', 25, 3108, 175, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (387, 9536.1200000000008, 'carga de datos_otro7.xlsx', 25, 3109, 598, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (388, 4500.2299999999996, 'carga de datos_otro7.xlsx', 25, 3107, 392, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (389, 3900, 'carga de datos_otro7.xlsx', 25, 3104, 1444, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (390, 4750, 'carga de datos_otro7.xlsx', 25, 3106, 463, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (391, 2300, 'carga de datos_otro7.xlsx', 25, 3108, 1357, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (392, 4220, 'carga de datos_otro7.xlsx', 23, 3109, 1178, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (393, 9536.1200000000008, 'carga de datos_otro7.xlsx', 23, 3107, 983, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (394, 4500.2299999999996, 'carga de datos_otro7.xlsx', 23, 3104, 1461, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (395, 8000, 'carga de datos_otro7.xlsx', 23, 3106, 1305, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (396, 9536.1200000000008, 'carga de datos_otro7.xlsx', 23, 3108, 582, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (397, 4500.2299999999996, 'carga de datos_otro7.xlsx', 23, 3109, 295, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (398, 8000, 'carga de datos_otro7.xlsx', 23, 3107, 989, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (399, 9536.1200000000008, 'carga de datos_otro7.xlsx', 23, 3104, 1116, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (400, 9536.1200000000008, 'carga de datos_otro7.xlsx', 23, 3106, 930, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (401, 4500.2299999999996, 'carga de datos_otro7.xlsx', 23, 3108, 908, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (402, 8000, 'carga de datos_otro7.xlsx', 18, 3109, 1325, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (403, 9536.1200000000008, 'carga de datos_otro7.xlsx', 18, 3107, 268, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (404, 4500.2299999999996, 'carga de datos_otro7.xlsx', 18, 3104, 1118, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (405, 8000, 'carga de datos_otro7.xlsx', 18, 3106, 801, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (406, 9536.1200000000008, 'carga de datos_otro7.xlsx', 18, 3108, 424, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (407, 4500.2299999999996, 'carga de datos_otro7.xlsx', 18, 3109, 355, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (408, 3900, 'carga de datos_otro7.xlsx', 18, 3107, 202, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (409, 4750, 'carga de datos_otro7.xlsx', 18, 3104, 1309, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (410, 2300, 'carga de datos_otro7.xlsx', 18, 3106, 283, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (411, 4220, 'carga de datos_otro7.xlsx', 18, 3108, 229, NULL, '2014-03-25 15:47:07', '2014-02-01');
INSERT INTO ventas VALUES (412, 4500.2299999999996, 'carga de datos_otro8.xlsx', 25, 3109, 450, NULL, '2014-03-26 16:02:05', '2014-02-04');
INSERT INTO ventas VALUES (413, 8000, 'carga de datos_otro8.xlsx', 25, 3107, 482, NULL, '2014-03-26 16:02:05', '2014-02-04');
INSERT INTO ventas VALUES (414, 9536.1200000000008, 'carga de datos_otro8.xlsx', 25, 3104, 631, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (415, 4500.2299999999996, 'carga de datos_otro8.xlsx', 25, 3106, 298, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (416, 8000, 'carga de datos_otro8.xlsx', 25, 3109, 319, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (417, 9536.1200000000008, 'carga de datos_otro8.xlsx', 25, 3109, 936, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (418, 4500.2299999999996, 'carga de datos_otro8.xlsx', 25, 3107, 440, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (419, 3900, 'carga de datos_otro8.xlsx', 25, 3104, 384, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (420, 4750, 'carga de datos_otro8.xlsx', 25, 3106, 537, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (421, 2300, 'carga de datos_otro8.xlsx', 25, 3109, 128, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (422, 4220, 'carga de datos_otro8.xlsx', 23, 3109, 711, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (423, 9536.1200000000008, 'carga de datos_otro8.xlsx', 23, 3107, 290, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (424, 4500.2299999999996, 'carga de datos_otro8.xlsx', 23, 3104, 298, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (425, 8000, 'carga de datos_otro8.xlsx', 23, 3106, 423, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (426, 9536.1200000000008, 'carga de datos_otro8.xlsx', 23, 3109, 530, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (427, 4500.2299999999996, 'carga de datos_otro8.xlsx', 23, 3109, 434, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (428, 8000, 'carga de datos_otro8.xlsx', 23, 3107, 275, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (429, 9536.1200000000008, 'carga de datos_otro8.xlsx', 23, 3104, 145, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (430, 9536.1200000000008, 'carga de datos_otro8.xlsx', 23, 3106, 857, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (431, 4500.2299999999996, 'carga de datos_otro8.xlsx', 23, 3107, 698, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (432, 8000, 'carga de datos_otro8.xlsx', 18, 3109, 472, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (433, 9536.1200000000008, 'carga de datos_otro8.xlsx', 18, 3107, 553, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (434, 4500.2299999999996, 'carga de datos_otro8.xlsx', 18, 3104, 354, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (435, 8000, 'carga de datos_otro8.xlsx', 18, 3106, 980, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (436, 9536.1200000000008, 'carga de datos_otro8.xlsx', 18, 3107, 689, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (437, 4500.2299999999996, 'carga de datos_otro8.xlsx', 18, 3109, 740, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (438, 3900, 'carga de datos_otro8.xlsx', 18, 3107, 204, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (439, 4750, 'carga de datos_otro8.xlsx', 18, 3104, 983, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (440, 2300, 'carga de datos_otro8.xlsx', 18, 3106, 927, NULL, '2014-03-26 16:02:07', '2014-02-04');
INSERT INTO ventas VALUES (441, 4220, 'carga de datos_otro8.xlsx', 18, 3106, 422, NULL, '2014-03-26 16:02:07', '2014-02-04');


--
-- Name: bodegaid; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bodegas
    ADD CONSTRAINT bodegaid UNIQUE (bodegaid);


--
-- Name: bodegasproductos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bodegasproductos
    ADD CONSTRAINT bodegasproductos_pkey PRIMARY KEY (idbodegaproductos);


--
-- Name: comisiones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY comisiones
    ADD CONSTRAINT comisiones_pkey PRIMARY KEY (idcomision);


--
-- Name: id_bodega_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY bodegas
    ADD CONSTRAINT id_bodega_pk PRIMARY KEY (bodegaid);


--
-- Name: id_categoria_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY categoriasp
    ADD CONSTRAINT id_categoria_pk PRIMARY KEY (idcategoria);


--
-- Name: id_ciudad_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ciudades
    ADD CONSTRAINT id_ciudad_pk PRIMARY KEY (idciudad);


--
-- Name: id_departamento; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY departamentos
    ADD CONSTRAINT id_departamento PRIMARY KEY (iddepartamento);


--
-- Name: id_detalle_venta; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY detalleventas
    ADD CONSTRAINT id_detalle_venta PRIMARY KEY (iddetalleventa);


--
-- Name: id_imagen_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY imagenes
    ADD CONSTRAINT id_imagen_pk PRIMARY KEY (idimagen);


--
-- Name: id_perfil_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfiles
    ADD CONSTRAINT id_perfil_pk PRIMARY KEY (idperfil);


--
-- Name: id_producto_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY productos
    ADD CONSTRAINT id_producto_pk PRIMARY KEY (idproducto);


--
-- Name: idbarrio_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY barrios
    ADD CONSTRAINT idbarrio_pk PRIMARY KEY (idbarrio);


--
-- Name: idbeneficiario_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY beneficiarios
    ADD CONSTRAINT idbeneficiario_pk PRIMARY KEY (idbeneficiario);


--
-- Name: idestado_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY estados
    ADD CONSTRAINT idestado_pk PRIMARY KEY (idestado);


--
-- Name: idfactura_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY facturaventas
    ADD CONSTRAINT idfactura_pk PRIMARY KEY (idfactura);


--
-- Name: idlocalidad_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY localidades
    ADD CONSTRAINT idlocalidad_pk PRIMARY KEY (idlocalidad);


--
-- Name: idmenu_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY menus
    ADD CONSTRAINT idmenu_pk PRIMARY KEY (idmenu);


--
-- Name: idperfilespermisos_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfiles_permisos
    ADD CONSTRAINT idperfilespermisos_pk PRIMARY KEY (idperfilespermisos);


--
-- Name: idperiodo_fk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodos
    ADD CONSTRAINT idperiodo_fk PRIMARY KEY (idperiodo);


--
-- Name: idsubmenu_fk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY submenus
    ADD CONSTRAINT idsubmenu_fk PRIMARY KEY (idsubmenu);


--
-- Name: idusuarios_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT idusuarios_pk PRIMARY KEY (idusuario);


--
-- Name: idventas_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY ventas
    ADD CONSTRAINT idventas_pk PRIMARY KEY (idventa);


--
-- Name: movimientos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT movimientos_pkey PRIMARY KEY (idmovimiento);


--
-- Name: perfiles_permisos_idperfil_idsubmenu_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY perfiles_permisos
    ADD CONSTRAINT perfiles_permisos_idperfil_idsubmenu_key UNIQUE (idperfil, idsubmenu);


--
-- Name: periodos_idperiodo_key; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodos
    ADD CONSTRAINT periodos_idperiodo_key UNIQUE (idperiodo);


--
-- Name: periodosventa_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY periodosventa
    ADD CONSTRAINT periodosventa_pkey PRIMARY KEY (idperiodosventa);


--
-- Name: pk_detallecomisiones; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY detallecomisiones
    ADD CONSTRAINT pk_detallecomisiones PRIMARY KEY (iddetallecomision);


--
-- Name: pk_detalledocumentos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY detalledocumentos
    ADD CONSTRAINT pk_detalledocumentos PRIMARY KEY (iddetallecodumentos);


--
-- Name: pk_documentos; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT pk_documentos PRIMARY KEY (iddocumento);


--
-- Name: productosproveedores_pk; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY productosproveedores
    ADD CONSTRAINT productosproveedores_pk PRIMARY KEY (idproductosproveedores);


--
-- Name: remisiones_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY remisiones
    ADD CONSTRAINT remisiones_pkey PRIMARY KEY (idremision);


--
-- Name: resolucionfacturas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY resolucionfacturas
    ADD CONSTRAINT resolucionfacturas_pkey PRIMARY KEY (idresolucionfactura);


--
-- Name: saldoinventario_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY saldoinventario
    ADD CONSTRAINT saldoinventario_pkey PRIMARY KEY (idsaldoinventario);


--
-- Name: terceros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY terceros
    ADD CONSTRAINT terceros_pkey PRIMARY KEY (idtercero);


--
-- Name: vencimientoproductos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY vencimientoproductos
    ADD CONSTRAINT vencimientoproductos_pkey PRIMARY KEY (idvencimientoproducto);


--
-- Name: bodega_vencidos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vencimientoproductos
    ADD CONSTRAINT bodega_vencidos_fk FOREIGN KEY (idbodega) REFERENCES bodegas(bodegaid);


--
-- Name: bodegas_bodegasproductos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bodegasproductos
    ADD CONSTRAINT bodegas_bodegasproductos_fk FOREIGN KEY (idbodega) REFERENCES bodegas(bodegaid);


--
-- Name: bodegas_documentos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT bodegas_documentos_fk FOREIGN KEY (idbodega) REFERENCES bodegas(bodegaid);


--
-- Name: bodegas_facturaventas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY facturaventas
    ADD CONSTRAINT bodegas_facturaventas_fk FOREIGN KEY (idbodega) REFERENCES bodegas(bodegaid);


--
-- Name: bodegas_idtercero_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bodegas
    ADD CONSTRAINT bodegas_idtercero_fk FOREIGN KEY (idtercero) REFERENCES terceros(idtercero);


--
-- Name: bodegas_movimientos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT bodegas_movimientos_fk FOREIGN KEY (idbodega) REFERENCES bodegas(bodegaid);


--
-- Name: bodegasproductos_movimientos_fp; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT bodegasproductos_movimientos_fp FOREIGN KEY (idbodegasproductos) REFERENCES bodegasproductos(idbodegaproductos);


--
-- Name: categoriasp_productos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY productos
    ADD CONSTRAINT categoriasp_productos_fk FOREIGN KEY (idcategoria) REFERENCES categoriasp(idcategoria);


--
-- Name: ciudades_terceros_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY terceros
    ADD CONSTRAINT ciudades_terceros_fk FOREIGN KEY (ciudad) REFERENCES ciudades(idciudad);


--
-- Name: departamentos_ciudades_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY ciudades
    ADD CONSTRAINT departamentos_ciudades_fk FOREIGN KEY (iddepartamento) REFERENCES departamentos(iddepartamento);


--
-- Name: documento_detalledocumento_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalledocumentos
    ADD CONSTRAINT documento_detalledocumento_fk FOREIGN KEY (iddocumento) REFERENCES documentos(iddocumento);


--
-- Name: documentos_movimientos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT documentos_movimientos_fk FOREIGN KEY (idocumento) REFERENCES documentos(iddocumento);


--
-- Name: estados_usuarios_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT estados_usuarios_fk FOREIGN KEY (idestado) REFERENCES estados(idestado);


--
-- Name: facturas_documentos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT facturas_documentos_fk FOREIGN KEY (idfactura) REFERENCES facturaventas(idfactura);


--
-- Name: facturaventa_movimientos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY movimientos
    ADD CONSTRAINT facturaventa_movimientos_fk FOREIGN KEY (idfacturaventa) REFERENCES facturaventas(idfactura);


--
-- Name: idperiodo_comisiones; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comisiones
    ADD CONSTRAINT idperiodo_comisiones FOREIGN KEY (idperiodo) REFERENCES periodos(idperiodo);


--
-- Name: idusuario_beneficiario_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY beneficiarios
    ADD CONSTRAINT idusuario_beneficiario_fk FOREIGN KEY (id_usuario) REFERENCES usuarios(idusuario) ON UPDATE CASCADE;


--
-- Name: idusuario_comisiones; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY comisiones
    ADD CONSTRAINT idusuario_comisiones FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario);


--
-- Name: imagenes_idimagen_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY productos
    ADD CONSTRAINT imagenes_idimagen_fk FOREIGN KEY (idimagen) REFERENCES imagenes(idimagen);


--
-- Name: menu_submenus_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY submenus
    ADD CONSTRAINT menu_submenus_fk FOREIGN KEY (idmenu) REFERENCES menus(idmenu);


--
-- Name: perfiles_perfiles_permisos; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles_permisos
    ADD CONSTRAINT perfiles_perfiles_permisos FOREIGN KEY (idperfil) REFERENCES perfiles(idperfil);


--
-- Name: perfiles_usuarios_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY usuarios
    ADD CONSTRAINT perfiles_usuarios_fk FOREIGN KEY (perfil) REFERENCES perfiles(idperfil);


--
-- Name: periodo_documentos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT periodo_documentos_fk FOREIGN KEY (idperiodo) REFERENCES periodos(idperiodo);


--
-- Name: periodos_facturaventas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY facturaventas
    ADD CONSTRAINT periodos_facturaventas_fk FOREIGN KEY (idperiodo) REFERENCES periodos(idperiodo);


--
-- Name: producto_vencimientoproductos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY vencimientoproductos
    ADD CONSTRAINT producto_vencimientoproductos_fk FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: productos_bodegasproductos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY bodegasproductos
    ADD CONSTRAINT productos_bodegasproductos_fk FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: productos_detalledocumento_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalledocumentos
    ADD CONSTRAINT productos_detalledocumento_fk FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: productos_detalleventas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalleventas
    ADD CONSTRAINT productos_detalleventas_fk FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: productos_productosproveedores_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY productosproveedores
    ADD CONSTRAINT productos_productosproveedores_fk FOREIGN KEY (idproducto) REFERENCES productos(idproducto);


--
-- Name: submenu_perfiles_permisos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY perfiles_permisos
    ADD CONSTRAINT submenu_perfiles_permisos_fk FOREIGN KEY (idsubmenu) REFERENCES submenus(idsubmenu);


--
-- Name: terceros_documentos_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY documentos
    ADD CONSTRAINT terceros_documentos_fk FOREIGN KEY (idtercero) REFERENCES terceros(idtercero);


--
-- Name: terceros_productosproveedores_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY productosproveedores
    ADD CONSTRAINT terceros_productosproveedores_fk FOREIGN KEY (idproveedor) REFERENCES terceros(idtercero);


--
-- Name: ventas_detalleventas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY detalleventas
    ADD CONSTRAINT ventas_detalleventas_fk FOREIGN KEY (idventa) REFERENCES ventas(idventa);


--
-- Name: ventas_facturas_fk; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY facturaventas
    ADD CONSTRAINT ventas_facturas_fk FOREIGN KEY (idventa) REFERENCES ventas(idventa);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- Name: beneficiarios; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE beneficiarios FROM PUBLIC;
REVOKE ALL ON TABLE beneficiarios FROM postgres;
GRANT ALL ON TABLE beneficiarios TO postgres;


--
-- Name: bodegas; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE bodegas FROM PUBLIC;
REVOKE ALL ON TABLE bodegas FROM postgres;
GRANT ALL ON TABLE bodegas TO postgres;


--
-- Name: categoriasp_idcategoria_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE categoriasp_idcategoria_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE categoriasp_idcategoria_seq FROM postgres;
GRANT ALL ON SEQUENCE categoriasp_idcategoria_seq TO postgres;


--
-- Name: categoriasp; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE categoriasp FROM PUBLIC;
REVOKE ALL ON TABLE categoriasp FROM postgres;
GRANT ALL ON TABLE categoriasp TO postgres;


--
-- Name: ciudades_id_ciudad_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE ciudades_id_ciudad_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE ciudades_id_ciudad_seq FROM postgres;
GRANT ALL ON SEQUENCE ciudades_id_ciudad_seq TO postgres;


--
-- Name: ciudades; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE ciudades FROM PUBLIC;
REVOKE ALL ON TABLE ciudades FROM postgres;
GRANT ALL ON TABLE ciudades TO postgres;


--
-- Name: departamentos_iddepartamento_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE departamentos_iddepartamento_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE departamentos_iddepartamento_seq FROM postgres;
GRANT ALL ON SEQUENCE departamentos_iddepartamento_seq TO postgres;


--
-- Name: departamentos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE departamentos FROM PUBLIC;
REVOKE ALL ON TABLE departamentos FROM postgres;
GRANT ALL ON TABLE departamentos TO postgres;


--
-- Name: detalleventas_iddetalleventa_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE detalleventas_iddetalleventa_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE detalleventas_iddetalleventa_seq FROM postgres;
GRANT ALL ON SEQUENCE detalleventas_iddetalleventa_seq TO postgres;


--
-- Name: detalleventas; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE detalleventas FROM PUBLIC;
REVOKE ALL ON TABLE detalleventas FROM postgres;
GRANT ALL ON TABLE detalleventas TO postgres;


--
-- Name: estados_idestado_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE estados_idestado_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE estados_idestado_seq FROM postgres;
GRANT ALL ON SEQUENCE estados_idestado_seq TO postgres;


--
-- Name: imagenes_idimagen_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE imagenes_idimagen_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE imagenes_idimagen_seq FROM postgres;
GRANT ALL ON SEQUENCE imagenes_idimagen_seq TO postgres;


--
-- Name: imagenes; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE imagenes FROM PUBLIC;
REVOKE ALL ON TABLE imagenes FROM postgres;
GRANT ALL ON TABLE imagenes TO postgres;


--
-- Name: localidades_idlocalidad_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE localidades_idlocalidad_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE localidades_idlocalidad_seq FROM postgres;
GRANT ALL ON SEQUENCE localidades_idlocalidad_seq TO postgres;


--
-- Name: menus_idmenu_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE menus_idmenu_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE menus_idmenu_seq FROM postgres;
GRANT ALL ON SEQUENCE menus_idmenu_seq TO postgres;


--
-- Name: modulos_idmodulo_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE modulos_idmodulo_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE modulos_idmodulo_seq FROM postgres;
GRANT ALL ON SEQUENCE modulos_idmodulo_seq TO postgres;


--
-- Name: perfiles_id_perfil_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE perfiles_id_perfil_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE perfiles_id_perfil_seq FROM postgres;
GRANT ALL ON SEQUENCE perfiles_id_perfil_seq TO postgres;


--
-- Name: perfiles; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE perfiles FROM PUBLIC;
REVOKE ALL ON TABLE perfiles FROM postgres;
GRANT ALL ON TABLE perfiles TO postgres;


--
-- Name: perfiles_permisos_id_idperfilespermisos_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE perfiles_permisos_id_idperfilespermisos_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE perfiles_permisos_id_idperfilespermisos_seq FROM postgres;
GRANT ALL ON SEQUENCE perfiles_permisos_id_idperfilespermisos_seq TO postgres;


--
-- Name: productos_idproducto_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE productos_idproducto_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE productos_idproducto_seq FROM postgres;
GRANT ALL ON SEQUENCE productos_idproducto_seq TO postgres;


--
-- Name: productos; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE productos FROM PUBLIC;
REVOKE ALL ON TABLE productos FROM postgres;
GRANT ALL ON TABLE productos TO postgres;


--
-- Name: subcategorias_idsubcategoria_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE subcategorias_idsubcategoria_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE subcategorias_idsubcategoria_seq FROM postgres;
GRANT ALL ON SEQUENCE subcategorias_idsubcategoria_seq TO postgres;


--
-- Name: submenus_idsubmenu_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE submenus_idsubmenu_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE submenus_idsubmenu_seq FROM postgres;
GRANT ALL ON SEQUENCE submenus_idsubmenu_seq TO postgres;


--
-- Name: submenus; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE submenus FROM PUBLIC;
REVOKE ALL ON TABLE submenus FROM postgres;
GRANT ALL ON TABLE submenus TO postgres;
GRANT ALL ON TABLE submenus TO PUBLIC;


--
-- Name: usuarios_idusuario_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE usuarios_idusuario_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE usuarios_idusuario_seq FROM postgres;
GRANT ALL ON SEQUENCE usuarios_idusuario_seq TO postgres;


--
-- Name: usuarios; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE usuarios FROM PUBLIC;
REVOKE ALL ON TABLE usuarios FROM postgres;
GRANT ALL ON TABLE usuarios TO postgres;


--
-- Name: ventas_idventa_seq; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON SEQUENCE ventas_idventa_seq FROM PUBLIC;
REVOKE ALL ON SEQUENCE ventas_idventa_seq FROM postgres;
GRANT ALL ON SEQUENCE ventas_idventa_seq TO postgres;


--
-- Name: ventas; Type: ACL; Schema: public; Owner: postgres
--

REVOKE ALL ON TABLE ventas FROM PUBLIC;
REVOKE ALL ON TABLE ventas FROM postgres;
GRANT ALL ON TABLE ventas TO postgres;


--
-- PostgreSQL database dump complete
--


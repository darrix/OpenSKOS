<?php

require_once 'AbstractController.php';

class Api_SetController extends AbstractController
{
   
    public function init()
    {
       parent::init();
       $this->fullNameResourceClass = 'OpenSkos2\Api\Set';
       $this ->viewpath="set/";
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Get OpenSKOS Sets
    
     * Get a detailed list of OpenSKOS sets
     *
     * @api {get} /api/set  Get OpenSKOS sets
     * @apiName GetSets
     * @apiGroup Set
     *
     * @apiParam {String=empty, "rdf","html","json","jsonp"}  format If set to jsonp, must contain parameter callback as well
     * @apiParam {String} callback If format set to jsonp, must be non-empty
     * 
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 200 OK
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" 
     *    xmlns:dc="http://purl.org/dc/elements/1.1/"
     *    xmlns:dcterms="http://purl.org/dc/terms/" 
     *    xmlns:skos="http://www.w3.org/2004/02/skos/core#" 
     *    xmlns:openskos="http://openskos.org/xmlns#" 
     *    openskos:numFound="2" openskos:rows="5000" 
     *    openskos:start="1">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da">
     *     &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *     &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *     &lt;openskos:webpage rdf:resource="http://ergens2"/>
     *     &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *     &lt;openskos:code>ISO-org&lt;/openskos:code>
     *     &lt;openskos:conceptBaseUri>http://example.com/set-example&lt;/openskos:conceptBaseUri>
     *     &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *     &lt;openskos:uuid>3cdae699-61f3-4454-b032-ccc6c4b2e5da&lt;/openskos:uuid>
     *     &lt;dcterms:title xml:lang="en">CLARIN Organisations&lt;/dcterms:title>
     *     &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens2"/>
     *   &lt;/rdf:Description>
     *   &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_5980699b-2c9a-4717-ac30-aed13743cc84">
     *     &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *     &lt;openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *     &lt;openskos:code>ISO-lang&lt;/openskos:code>
     *     &lt;dcterms:title xml:lang="en">CLARIN Languages upd&lt;/dcterms:title>
     *     &lt;openskos:webpage rdf:resource="http://ergens"/>
     *     &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *     &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *     &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *     &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *     &lt;openskos:uuid>5980699b-2c9a-4717-ac30-aed13743cc84&lt;/openskos:uuid>
     *  &lt;/rdf:Description>
     *  &lt;/rdf:RDF>
     * 
     */
     public function indexAction()
    {
      parent::indexAction();
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Get an OpenSKOS Set by its uri or uuid.
     *
     * @api {get} /api/set/ Get OpenSKOS set details given its id (which is set to the set's uri or uuid) as a request parameter
     * @api {get} /api/set/{uuid}[.rdf, .html, .json, .jsonp] Get OpenSKOS set
     * @apiName GetSet
     * @apiGroup Set
     *
     * @apiParam {String} id
     * @apiParam {String=empty, "rdf","html","json","jsonp"}  format If set to jsonp, the request must contain a non-empty parameter "callback" as well
     * @apiParam {String} callback If format set to jsonp, must be non-empty
     * 
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 200 OK
     *   &lt;?xml version="1.0" encoding="utf-8" ?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *       xmlns:openskos="http://openskos.org/xmlns#"
     *       xmlns:dcterms="http://purl.org/dc/terms/">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_5980699b-2c9a-4717-ac30-aed13743cc84">
     *   &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *   &lt;openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *   &lt;openskos:code>ISO-lang&lt;/openskos:code>
     *   &lt;openskos:webpage rdf:resource="http://ergens"/>
     *   &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *   &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *   &lt;dcterms:title xml:lang="en">CLARIN Languages&lt;/dcterms:title>
     *   &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *   &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *   &lt;openskos:uuid>5980699b-2c9a-4717-ac30-aed13743cc84&lt;/openskos:uuid>
     * &lt;/rdf:Description>
     * &lt;/rdf:RDF>
     * 
     * @apiError NotFound X-Error-Msg: The requested resource &lt;id> of type http://purl.org/dc/dcmitype#Dataset was not found in the triple store.
     * @apiErrorExample Not found:
     *   HTTP/1.1 404 Not Found
     *   The requested resource &lt;id> of type http://purl.org/dc/dcmitype#Dataset was not found in the triple store.
     */
   
    public function getAction()
    {
        parent::getAction();
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Create a new OpenSKOS set based on the post data.
     * The set's code and the web-page provided in the request body, must be unique. 
     * The obligatory publisher reference must be the reference to an existing institution and must 
     * coinside with the one with tenant code given in the request parameter.
     * If one of the conditions above is not fullfilled the validator will throw an error.
     *
     @apiExample {String} Example request
     * <?xml version="1.0" encoding="UTF-8"?>
     * <rdf:RDF xmlns:rdf = "http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *     xmlns:openskos = "http://openskos.org/xmlns#"
     *     xmlns:dcterms = "http://purl.org/dc/terms/"
     *     xmlns:dcmitype = "http://purl.org/dc/dcmitype#">
     *     <rdf:Description>
     *         <openskos:code>ISO-lang&lt;/openskos:code>
     *         <dcterms:title xml:lang="en">CLARIN Languages&lt;/dcterms:title>
     *         <dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/">&lt;/dcterms:license>
     *         <dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785">&lt;/dcterms:publisher>
     *         <openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *         <openskos:allow_oai>true&lt;/openskos:allow_oai>
     *         <openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *         <openskos:webpage rdf:resource="http://ergens"/>
     *      </rdf:Description>
     * </rdf:RDF>
     *
     * @api {post} /api/set Create an OpenSKOS set
     * @apiName CreateSet
     * @apiGroup Set
     *
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
     * @apiParam {String="true","false","1","0"} autoGenerateIdentifiers If set to true (any of "1", "true", "on" and "yes") the concept uri (rdf:about) will be automatically generated.
     *                                           If uri exists in the xml and autoGenerateIdentifiers is true - an error will be thrown.
     *                                           If set to false - the xml must contain uri (rdf:about).
     * @apiSuccess {String} Location Set uri
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 201 Created
     *   &lt;?xml version="1.0" encoding="utf-8" ?>
     *   &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *       xmlns:openskos="http://openskos.org/xmlns#"
     *       xmlns:dcterms="http://purl.org/dc/terms/">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_5980699b-2c9a-4717-ac30-aed13743cc84">
     *   &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *   &lt;openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *   &lt;openskos:code>ISO-lang&lt;/openskos:code>
     *   &lt;openskos:webpage rdf:resource="http://ergens"/>
     *   &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *   &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *   &lt;dcterms:title xml:lang="en">CLARIN Languages&lt;/dcterms:title>
     *   &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *   &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *   &lt;openskos:uuid>5980699b-2c9a-4717-ac30-aed13743cc84&lt;/openskos:uuid>
     *   &lt;/rdf:Description>
     *  &lt;/rdf:RDF>
     * 
     * @apiError MissingKey X-Error-Msg: No user key specified
     * @apiErrorExample MissingKey:
     *   HTTP/1.1 412 Precondition Failed
     *   No user key specified
     * 
     * @apiError MissingTenant X-Error-Msg: No tenant specified
     * @apiErrorExample MissingTenant:
     *   HTTP/1.1 412 Precondition Failed
     *   No tenant specified
     * 
     * @apiError SetExists X-Error-Msg: The resource with &lt;id> already exists. Use PUT instead.
     * @apiErrorExample SetExists:
     *   HTTP/1.1 400 Bad request
     *   The resource with &lt;id> already exists. Use PUT instead.
     * 
     * @apiError ValidationError X-Error-Msg: The resource (of type http://www.w3.org/ns/org#FormalOrganization) referred by  uri &lt;publisher's reference> is not found.
     * @apiErrorExample ValidationError: 
     *   HTTP/1.1 400 Bad request
     *   The resource (of type http://www.w3.org/ns/org#FormalOrganization) referred by  uri &lt;publisher's reference> is not found.
     *
     */
    public function postAction()
    {
       parent::postAction();
    }
    
        
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Update an OpenSKOS set based on the post data
     *
     @apiExample {String} Example request
     * <?xml version="1.0" encoding="UTF-8"?>
     * <rdf:RDF xmlns:rdf = "http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *    xmlns:openskos = "http://openskos.org/xmlns#"
     *    xmlns:dcterms = "http://purl.org/dc/terms/"
     *   xmlns:dcmitype = "http://purl.org/dc/dcmitype#">
     *  <rdf:Description>
     *     <openskos:code>ISO-lang&lt;/openskos:code>
     *     <dcterms:title xml:lang="en">CLARIN Languages new&lt;/dcterms:title>
     *     <dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/">&lt;/dcterms:license>
     *     <dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785">&lt;/dcterms:publisher>
     *     <openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *     <openskos:allow_oai>true&lt;/openskos:allow_oai>
     *     <openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *     <openskos:webpage rdf:resource="http://ergens"/>
     *  </rdf:Description>
     * </rdf:RDF>
     *
     * @api {post} /api/set Update SKOS set
     * @apiName UpdateSet
     * @apiGroup Set
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
       @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 200 OK
     *   &lt;?xml version="1.0" encoding="utf-8" ?>
     *   &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *       xmlns:openskos="http://openskos.org/xmlns#"
     *       xmlns:dcterms="http://purl.org/dc/terms/">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_5980699b-2c9a-4717-ac30-aed13743cc84">
     *   &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *   &lt;openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *   &lt;openskos:code>ISO-lang&lt;/openskos:code>
     *   &lt;openskos:webpage rdf:resource="http://ergens"/>
     *   &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *   &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *   &lt;dcterms:title xml:lang="en">CLARIN Languages new&lt;/dcterms:title>
     *   &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *   &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *   &lt;openskos:uuid>5980699b-2c9a-4717-ac30-aed13743cc84&lt;/openskos:uuid>
     *   &lt;/rdf:Description>
     *   &lt;/rdf:RDF>
     * 
     * @apiError MissingKey X-Error-Msg: No user key specified
     * @apiErrorExample MissingKey:
     *   HTTP/1.1 412 Precondition Failed
     *   No user key specified
     * 
     * @apiError MissingTenant X-Error-Msg: No tenant specified
     * @apiErrorExample MissingTenant:
     *   HTTP/1.1 412 Precondition Failed
     *   No tenant specified
     * 
     * @apiError ValidationError X-Error-Msg: The given publisher &lt;publisher's reference>  does not correspond to the tenant code given in the parameter request which refers to the tenant with uri &lt;tenant's uri>.
     * @apiErrorExample ValidationError: 
     *   HTTP/1.1 400 Bad request
     *   The given publisher &lt;publisher's reference>  does not correspond to the tenant code given in the parameter request which refers to the tenant with uri &lt;tenant's uri>.
     *
     */
    public function putAction()
    {
        parent::putAction();
    }
    
     /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Delete an OpensSKOS Set by its uri
     * @api {delete} /api/set Delete OpensSKOS set
     * @apiName DeleteSet
     * @apiGroup Set
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
     * @apiParam {String} id The uri of the set
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *    HTTP/1.1 200 OK
     * &lt;?xml version="1.0" encoding="utf-8" ?>
     *   &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *       xmlns:openskos="http://openskos.org/xmlns#"
     *       xmlns:dcterms="http://purl.org/dc/terms/">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_5980699b-2c9a-4717-ac30-aed13743cc84">
     *   &lt;rdf:type rdf:resource="http://purl.org/dc/dcmitype#Dataset"/>
     *   &lt;openskos:conceptBaseUri>http://example.com/collection-example&lt;/openskos:conceptBaseUri>
     *   &lt;openskos:code>ISO-lang&lt;/openskos:code>
     *   &lt;openskos:webpage rdf:resource="http://ergens"/>
     *   &lt;dcterms:license rdf:resource="http://creativecommons.org/licenses/by/4.0/"/>
     *   &lt;openskos:OAI_baseURL rdf:resource="https://openskos.meertens.knaw.nl/api/ergens1"/>
     *   &lt;dcterms:title xml:lang="en">CLARIN Languages new&lt;/dcterms:title>
     *   &lt;openskos:allow_oai rdf:datatype="http://www.w3.org/2001/XMLSchema#bool">true&lt;/openskos:allow_oai>
     *   &lt;dcterms:publisher rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *   &lt;openskos:uuid>5980699b-2c9a-4717-ac30-aed13743cc84&lt;/openskos:uuid>
     *   &lt;/rdf:Description>
     *   &lt;/rdf:RDF>
     * 
     * @apiError Not found X-Error-Msg: The requested resource &lt;id> of type http://purl.org/dc/dcmitype#Dataset was not found in the triple store.
     * @apiErrorExample NotFound
     *   HTTP/1.1 404 NotFound
     *   The requested resource &lt;id> of type http://purl.org/dc/dcmitype#Dataset was not found in the triple store.
     * 
     * @apiError MissingKey X-Error-Msg: No user key specified
     * @apiErrorExample MissingKey
     *   HTTP/1.1 412 Precondition Failed
     *   No user key specified
     * 
     * @apiError MissingTenant X-Error-Msg:  No tenant specified
     * @apiErrorExample MissingTenant
     *   HTTP/1.1 412 Precondition Failed
     *   No tenant specified
     */
    public function deleteAction()
    {
        parent::deleteAction();
    }
}


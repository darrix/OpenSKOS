<?php

require_once 'AbstractController.php';

class Api_SkoscollectionController extends AbstractController
{
     public function init()
    {
       parent::init();
       $this->fullNameResourceClass = 'OpenSkos2\Api\SkosCollection';
       $this ->viewpath="skoscollection/";
      
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Return a list of SKOS Collections
     * @api {get} /api/skoscollection   Get SKOS collections
     * @apiName GetSkosCollections
     * @apiGroup SkosCollection
     *
     * @apiParam {String=empty, "rdf","html","json","jsonp"}  format If set to jsonp, the request must contain non-empty parameter callback as well
     * @apiParam {String} callback If format set to jsonp, must be non-empty
     * 
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 200 OK 
     * &lt;?xml version="1.0"?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" 
     *  xmlns:dc="http://purl.org/dc/elements/1.1/" 
     *  xmlns:dcterms="http://purl.org/dc/terms/" 
     *  xmlns:skos="http://www.w3.org/2004/02/skos/core#" 
     *  xmlns:openskos="http://openskos.org/xmlns#" 
     *  openskos:numFound="2" openskos:rows="5000" 
     *  openskos:start="1">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_2dfa20f7-9e84-4b80-9a00-83e5a66b6933">
     *   &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *   &lt;dcterms:contributor rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *   &lt;dcterms:modified rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T13:05:47+00:00&lt;/dcterms:modified>
     *   &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *   &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *   &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *   &lt;dcterms:title xml:lang="en">SkosCollection1new&lt;/dcterms:title>
     *   &lt;openskos:uuid>2dfa20f7-9e84-4b80-9a00-83e5a66b6933&lt;/openskos:uuid>
     *   &lt;openskos:tenant rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     * &lt;/rdf:Description>
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_5234162d-dc05-462f-90a6-5e42f4d5c07e">
     *   &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *   &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *   &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *   &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *   &lt;dcterms:title xml:lang="en">SkosCollection1&lt;/dcterms:title>
     *   &lt;openskos:uuid>5234162d-dc05-462f-90a6-5e42f4d5c07e&lt;/openskos:uuid>
     *   &lt;openskos:tenant rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     * &lt;/rdf:Description>
     * &lt;/rdf:RDF>
    * 
    */
     public function indexAction()
    {
       parent::indexAction();
    }
   
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Return a specific SKOS collection given its uri or uuid
     *
     * @api {get} /api/skoscollection/ Get SKOS collection details given its id (which is set to the collection's uri or uuid) as a request parameter
     * @api {get} /api/skoscollection/{uuid}[.rdf, .html, .json, .jsonp] Get SKOS collection details
     * @apiName GetSkosCollection
     * @apiGroup SkosCollection
     *
     * @apiParam {String} id (uuid, or uri)
     * @apiParam {String=empty, "rdf","html","json","jsonp"}  format If set to jsonp, the request must contain a non-empty parameter "callback" as well
     * @apiParam {String} callback If format set to jsonp, must be non-empty
     * 
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 200 OK
     * &lt;?xml version="1.0" encoding="utf-8" ?>
     * &lt;?xml version="1.0"?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" 
     *  xmlns:dc="http://purl.org/dc/elements/1.1/" 
     *  xmlns:dcterms="http://purl.org/dc/terms/" 
     *  xmlns:skos="http://www.w3.org/2004/02/skos/core#" 
     *  xmlns:openskos="http://openskos.org/xmlns#" 
     *  openskos:numFound="1" openskos:rows="5000" openskos:start="1">
     * &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_5234162d-dc05-462f-90a6-5e42f4d5c07e">
     *    &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *     &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *     &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *     &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *     &lt;dcterms:title xml:lang="en">SkosCollection1&lt;/dcterms:title>
     *     &lt;openskos:uuid>5234162d-dc05-462f-90a6-5e42f4d5c07e&lt;/openskos:uuid>
     *     &lt;openskos:tenant rdf:resource="http://mertens/knaw/formalorganization_10302a0e-7e4e-4dbb-bce0-59e2a21c8785"/>
     *   &lt;/rdf:Description>
     * &lt;/rdf:RDF>
     * 
     * @apiError NotFound X-Error-Msg: The requested resource &lt;id> of type http://www.w3.org/2004/02/skos/core#Collection was not found in the triple store.
     * @apiErrorExample Not found:
     *   HTTP/1.1 404 Not Found
     *   The requested resource &lt;id> of type http://www.w3.org/2004/02/skos/core#Collection was not found in the triple store.
     */
    public function getAction()
    {
        parent::getAction();
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Create a SKOS collecion 
    
     * Create a new SKOS collection based on the post data
     * The collection's title provided in the requests' body has an obligatory attribute "language".
     * The title must be unique per language and single per language.
     * The reference to a set, to which  the collection under submission belongs to, must be the reference to an existing set.
     * If one of the conditions above is not fullfilled the validator will throw an error.
     * 
     * 
     * @apiExample {String} Example request
     * <rdf:RDF xmlns:rdf = "http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *          xmlns:openskos = "http://openskos.org/xmlns#"
     *          xmlns:dcterms = "http://purl.org/dc/terms/"
     *          xmlns:skos="http://www.w3.org/2004/02/skos/core#">
     *     <rdf:Description>
     *     <openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *     <dcterms:title xml:lang="en">SkosCollection1&lt;/dcterms:title>
     * </rdf:Description>
     * </rdf:RDF>
     *
     * @api {post} /api/skoscollection Create SKOS collection
     * @apiName CreateSKosCollection
     * @apiGroup SkosCollection
     *
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
     * @apiParam {String="true","false","1","0"} autoGenerateIdentifiers If set to true (any of "1", "true", "on" and "yes") the concept uri (rdf:about) will be automatically generated.
     *                                           If uri exists in the xml and autoGenerateIdentifiers is true - an error will be thrown.
     *                                           If set to false - the xml must contain uri (rdf:about).
     * @apiSuccess {String} SkosCollection uri
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 201 Created
     * &lt;?xml version="1.0" encoding="utf-8" ?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *         xmlns:dcterms="http://purl.org/dc/terms/"
     *          xmlns:openskos="http://openskos.org/xmlns#">
     *  &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_5234162d-dc05-462f-90a6-5e42f4d5c07e">
     *    &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *    &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *     &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *    &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *    &lt;dcterms:title xml:lang="en">SkosCollection1&lt;/dcterms:title>
     *    &lt;openskos:uuid>5234162d-dc05-462f-90a6-5e42f4d5c07e&lt;/openskos:uuid>
     *   &lt;/rdf:Description>
     * &lt;/rdf:RDF>
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
     * @apiError SkosCollectionExists X-Error-Msg: The resource with &lt;id> already exists. Use PUT instead.
     * @apiErrorExample SkosCollectionExists:
     *   HTTP/1.1 400 Bad request
     *   The resource with &lt;id> already exists. Use PUT instead.
     * 
     * @apiError ValidationError X-Error-Msg: http://purl.org/dc/terms/title is required for all resources of this type.
     * @apiErrorExample ValidationError: 
     *   HTTP/1.1 400 Bad request
     *   http://purl.org/dc/terms/title is required for all resources of this type.
     * 
     * 
     */
    public function postAction()
    {
       parent::postAction();
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Update a SKOS collection based on the post data. Validation requirements are the same as for the POST request.
     *
     * @apiExample {String} Example request
     * <rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *          xmlns:dcterms="http://purl.org/dc/terms/"
     *          :openskos="http://openskos.org/xmlns#"
     *          xmlns:skos="http://www.w3.org/2004/02/skos/core#">
     *  <rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_2dfa20f7-9e84-4b80-9a00-83e5a66b6933">
     *    <openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *    <dcterms:title xml:lang="en">SkosCollection1new&lt;/dcterms:title>
     *    <openskos:uuid>2dfa20f7-9e84-4b80-9a00-83e5a66b6933&lt;/openskos:uuid>
     * </rdf:description>
     * </rdf:RDF>
     *
     * @api {post} /api/skoscollection Update SKOS collection
     * @apiName UpdateSkosCollection
     * @apiGroup SkosCollection
     *
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
     * @apiParam {String="true","false","1","0"} autoGenerateIdentifiers If set to true (any of "1", "true", "on" and "yes") the concept uri (rdf:about) will be automatically generated.
     *                                           If uri exists in the xml and autoGenerateIdentifiers is true - an error will be thrown.
     *                                           If set to false - the xml must contain uri (rdf:about).
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     *   HTTP/1.1 201 Created
     * &lt;?xml version="1.0" encoding="utf-8" ?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *         xmlns:dcterms="http://purl.org/dc/terms/"
     *          xmlns:openskos="http://openskos.org/xmlns#">
     *  &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_5234162d-dc05-462f-90a6-5e42f4d5c07e">
     *     &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *      &lt;dcterms:contributor rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *      &lt;dcterms:modified rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T13:05:47+00:00&lt;/dcterms:modified>
     *      &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *      &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *      &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *      &lt;dcterms:title xml:lang="en">SkosCollection1new&lt;/dcterms:title>
     *      &lt;openskos:uuid>5234162d-dc05-462f-90a6-5e42f4d5c07e&lt;/openskos:uuid>
     *   &lt;/rdf:Description>
     * &lt;/rdf:RDF>
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
     * @apiError MissedUri X-Error-Msg:  Missed uri (rdf:about)!
     * @apiErrorExample MissedUri: 
     *   HTTP/1.1 400 Bad request
     *   Missed uri (rdf:about)!
     *
     * @apiError ChangedOrNoUuid X-Error-Msg:  You cannot change UUID of the resouce. Keep it &lt;oldUuid>
     * @apiErrorExample ChangedOrNoUuid: 
     *   HTTP/1.1 400 Bad request
     *   You cannot change UUID of the resouce. Keep it &lt;oldUuid>
     * 
     * Validation error are identic to validation errors for POST requests, and similar to concept shcme validation errors.
     * 
     */
    
    
    
    public function putAction()
    {
        parent::putAction();
    }
    
    /**
     *
     * @apiVersion 1.0.0
     * @apiDescription Delete a SKOS collection by its uri
     * @api {delete} /api/skoscollection delete SKOS collection
     * @apiName DeleteSkosCollection
     * @apiGroup SkosCollection
     *
     * @apiParam {String} tenant The institute code for your institute in the OpenSKOS portal
     * @apiParam {String} key A valid API key
     * @apiParam {String} uri The uri of the collection
     * @apiSuccess {String} StatusCode 200 OK.
     * @apiSuccessExample {xml+rdf} Success-Response:
     * HTTP/1.1 200 OK
     * &lt;?xml version="1.0" encoding="utf-8" ?>
     * &lt;rdf:RDF xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
     *       xmlns:openskos="http://openskos.org/xmlns#"
     *       xmlns:dcterms="http://purl.org/dc/terms/">
     *  &lt;rdf:Description rdf:about="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da/collection_2dfa20f7-9e84-4b80-9a00-83e5a66b6933">
     *     &lt;rdf:type rdf:resource="http://www.w3.org/2004/02/skos/core#Collection"/>
     *     &lt;dcterms:contributor rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *      &lt;dcterms:modified rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T13:05:47+00:00&lt;/dcterms:modified>
     *     &lt;dcterms:dateSubmitted rdf:datatype="http://www.w3.org/2001/XMLSchema#dateTime">2017-02-22T12:46:23+00:00&lt;/dcterms:dateSubmitted>
     *     &lt;dcterms:creator rdf:resource="http://localhost/clavas/public/api/users/26272b05-6833-4ace-8e36-5b650fcefcdb"/>
     *     &lt;openskos:set rdf:resource="http://mertens/knaw/dataset_3cdae699-61f3-4454-b032-ccc6c4b2e5da"/>
     *     &lt;dcterms:title xml:lang="en">SkosCollection1new&lt;/dcterms:title>
     *     &lt;openskos:uuid>2dfa20f7-9e84-4b80-9a00-83e5a66b6933&lt;/openskos:uuid>
     * &lt;/rdf:RDF>
     * 
     * @apiError Not found X-Error-Msg: The requested resource &lt;uri> of type type http://www.w3.org/2004/02/skos/core#Collection was not found in the triple store.
     * @apiErrorExample NotFound
     *   HTTP/1.1 404 NotFound
     *   The requested resource &lt;uri> of type type http://www.w3.org/2004/02/skos/core#Collection was not found in the triple store.
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
     * @apiError MissedUri X-Error-Msg:  Missing uri parameter
     * @apiErrorExample MissedUri: 
     *   HTTP/1.1 400 Bad request
     *   Missing uri parameter
     */
    public function deleteAction()
    {
        parent::deleteAction();
    }
}
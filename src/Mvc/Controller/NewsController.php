<?php

namespace TiloBaller\Mvc\Controller;

use TiloBaller\Library\Validator;
use TiloBaller\Mvc\Domain\Model\NewsModel;
use TiloBaller\Mvc\Domain\Repository\NewsRepository;

/**
 * Class NewsController
 *
 * @package TiloBaller\Mvc\Controller
 */
class NewsController extends AbstractController {

    /**
     * @var NewsRepository
     */
    protected $newsRepository;

    /**
     * Constructor
     *
     * @inheritDoc
     */
    public function __construct($request) {
        parent::__construct($request);

        $this->newsRepository = new NewsRepository();
    }

    /**
     * Default action, lists all news entries in reverse chronological order
     */
    public function indexAction() {
        $this->render('list', array(
            'entries' => $this->newsRepository->getAll(array('date' => 'DESC'))
        ));
    }

    /**
     * Show a single news with complete content
     */
    public function singleAction() {
        if (!isset($this->request['id']) || empty($news = $this->newsRepository->getOneById($this->request['id']))) {
            http_response_code(404);
            return;
        }

        $this->render('single', array(
            'news' => $news
        ));
    }

    /**
     * Add a new news
     */
    public function addAction() {
        if (!isset($this->request['submit'])) {
            $this->setValidatorRulesForNewsForm();

            $this->render('form', array(
                'mode' => 'add'
            ));
            return;
        }

        $this->validateAndPersistNewsFormData('add', new NewsModel());
    }

    /**
     * Update an existing news
     */
    public function updateAction() {
        if (!isset($this->request['id']) || empty($news = $this->newsRepository->getOneById($this->request['id']))) {
            $this->render('list', array(
                'entries'              => $this->newsRepository->getAll(array('date' => 'DESC')),
                'newsToUpdateNotFound' => true
            ));

            return;
        }

        if (!isset($this->request['submit'])) {
            $this->setValidatorRulesForNewsForm();

            $this->render('form', array(
                'news' => $news,
                'mode' => 'update'
            ));
            return;
        }

        $this->validateAndPersistNewsFormData('update', $news);
    }

    /**
     * Set validator rules for news form
     */
    protected function setValidatorRulesForNewsForm() {
        Validator::addRule('date',     Validator::RULE_REQUIRED);
        Validator::addRule('author',   Validator::RULE_REQUIRED);
        Validator::addRule('title',    Validator::RULE_REQUIRED);
        Validator::addRule('abstract', Validator::RULE_REQUIRED);
        Validator::addRule('body',     Validator::RULE_REQUIRED);
    }

    /**
     * @param $mode
     * @param $news NewsModel
     */
    protected function validateAndPersistNewsFormData($mode, $news) {
        if ($mode !== 'add' && $mode !== 'update') {
            throw new \InvalidArgumentException(
                sprintf('$mode must be one of \'add\' oder \'update\'. \'%s\' given.', $mode)
            );
        }

        $news->setDate($this->request['date']);
        $news->setAuthor($this->request['author']);
        $news->setTitle($this->request['title']);
        $news->setAbstract($this->request['abstract']);
        $news->setBody($this->request['body']);

        $this->setValidatorRulesForNewsForm();

        $isValid = Validator::validate($this->request);

        if ($isValid && ($persistedNews = $this->newsRepository->$mode($news)) !== false) {
            $this->render('single', array(
                'news'           => $persistedNews,
                $mode . 'Result' => true
            ));
        } else {
            $params = array(
                'news' => $news,
                'mode' => $mode
            );

            if ($isValid) {
                $params[$mode . 'Result'] = false;
            }

            $this->render('form', $params);
        }
    }

    /**
     * Remove a single news entry
     */
    public function removeAction() {
        $result = isset($this->request['id'])
            && !empty($news = $this->newsRepository->getOneById($this->request['id']))
            && $this->newsRepository->remove($news);

        $this->render('list', array(
            'entries'      => $this->newsRepository->getAll(array('date' => 'DESC')),
            'removeResult' => $result
        ));
    }
}
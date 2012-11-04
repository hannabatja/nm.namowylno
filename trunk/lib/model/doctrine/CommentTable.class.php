<?php

/**
 * CommentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CommentTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CommentTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Comment');
    }
    
    
    
    public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('id, object_type, object_id, text, ip_address, user_id, name, created_at');
        $q = self::params($q, $params);
                
        return $q->fetchArray();
    }
    
    
    public function doFetchSelection($params = array())
    {
        $res = array();
        $rss = self::doFetchArray($params);
        foreach ($rss as $rs)
        {
          $res[$rs['id']] = $rs['link'];
        }
        return $res;
    }
  
    
    public function doFetchOne($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        return $q->fetchOne();
    }
    
  
    
    public function getPager($params = array(), $page=1)
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        $pager = new sfDoctrinePager('Comment', sfConfig::get('app_pager', 30));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Comment');
  
        if(isset($params['id']) && $params['id'])
            $q->andWhere('id= ?', $params['id']);

        if(isset($params['objectType']) && $params['objectType'])
            $q->andWhere('object_type= ?', $params['objectType']);
            
        if(isset($params['objectId']) && $params['objectId'])
            $q->andWhere('object_id= ?', $params['objectId']);
            
        if(isset($params['name']) && $params['name'])
            $q->andWhere('name= ?', $params['name']);
            
        if(isset($params['ip_address']) && $params['ip_address'])
            $q->andWhere('ip_address= ?', $params['ip_address']);
            
        if(isset($params['text']) && $params['text'])
            $q->andWhere('text= ?', $params['text']);

        if(isset($params['keyword']) && $params['keyword'])
            $q->andWhere('text LIKE ? OR name LIKE ?', array('%'.$params['keyword'].'%', '%'.$params['keyword'].'%'));
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_pager', 30);
        $q->limit($limit);
        
        $q->orderBy('created_at ASC');
  
        return $q;
    }
}
<?php

/**
 * LoveTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class LoveTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object LoveTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Love');
    }
    
		public function doExecute($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        
        return $q->execute();
    }
    
  
    public function doFetchArray($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        return $q->fetchArray();
    }
    
    
    public function doFetchSelection($params = array())
    {
        $res = array();
        $rss = self::doFetchArray($params);
        foreach ($rss as $rs)
        {
          $res[$rs['id']] = $rs['title'];
        }
        return $res;
    }
    
    
    public function doFetchOne($params = array())
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
        return $q->fetchOne();
    }
    
  
    public function doCount($params = array())
    {
        $q = Doctrine_Query::create()->select('count(id)');
        $q = self::params($q, $params);
        return $q->count();
    }
    
    public function getPager($params = array(), $page=1)
    {
        $q = Doctrine_Query::create()->select('*');
        $q = self::params($q, $params);
                
        $pager = new sfDoctrinePager('Love', sfConfig::get('app_pager', 10));
        $pager->setPage($page);
        $pager->setQuery($q);
        $pager->init();
        
        return $pager;
    }
    
    
    private function params($q, $params = array())
    {
        $q->from('Love');
  
        if(isset($params['id']) && $params['id'] != null)
            $q->andWhere('id = ?', $params['id']);
            
        if(isset($params['idO']) && $params['idO'] != null)
            $q->andWhere('id <> ?', $params['idO']);
            
            
        if(isset($params['objectType']) && $params['objectType'] != null)
            $q->andWhere('object_type= ?', $params['objectType']);
            
        if(isset($params['objectId']) && $params['objectId'] != null)
            $q->andWhere('object_id= ?', $params['objectId']);
				
        if(isset($params['userId']) && $params['userId'] != null)
            $q->andWhere('user_id= ?', $params['userId']);
            
        if(isset($params['ipAddress']) && $params['ipAddress'] != null)
            $q->andWhere('ip_address= ?', $params['ipAddress']);
        
        $limit = isset($params['limit']) ? $params['limit'] : sfConfig::get('app_limit', 30);
        $q->limit($limit);
        
        $order = isset($params['order']) ? $params['order'] : 'created_at DESC';
        $q->orderBy($order);
  
        if(isset($params['groupBy']) && $params['groupBy']) 
            $q->groupBy($params['groupBy']);

        return $q;
    }
  

}
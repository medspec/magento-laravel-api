<?php

namespace Grayloon\Magento\Api;

class Categories extends AbstractApi
{

    /**
     * The root category.
     */
    public function tree($depth = 10)
    {
        return $this->get('/categories?depth='. $depth);
    }

    /**
     * The list of categories.
     *
     * @param  int  $pageSize
     * @param  int  $currentPage
     * @return array
     */
    public function all($pageSize = 50, $currentPage = 1, $filters = [])
    {
        return $this->get('/categories/list', array_merge($filters, [
            'searchCriteria[pageSize]'    => $pageSize,
            'searchCriteria[currentPage]' => $currentPage,
        ]));
    }



    /**
     * Get products assigned to category.
     *
     * @param  int  $categoryId
     * @return array
     */
    public function products($categoryId)
    {
        $this->validateSingleStoreCode();

        return $this->get('/categories/'.$categoryId.'/products');
    }
}

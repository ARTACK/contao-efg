<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * @package   Efg
 * @author    Thomas Kuhn <mail@th-kuhn.de>
 * @license   http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 * @copyright Thomas Kuhn 2007-2012
 */


/**
 * Namespace
 */
namespace Efg;


/**
 * Class EfgFormGallery
 * based on ContentGallery by Leo Feyer
 *
 * Renders gallery with radio buttons or checkboxess
 * @copyright  Thomas Kuhn 2007-2012
 * @author     Thomas Kuhn <mail@th-kuhn.de>
 * @package    Efg
 */
class EfgFormGallery extends \ContentElement
{

	/**
	 * Files object
	 * @var \FilesModel
	 */
	protected $objFiles;

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'form_efg_imageselect';

	protected $widget = null;


	/**
	 * Initialize the object
	 * @param object
	 * @return string
	 */
	public function __construct(\Widget $objWidget, $arrConfig)
	{
		$this->widget = $objWidget;
		$this->multiSRC = $arrConfig['efgMultiSRC'];
		$this->efgImageMultiple = $arrConfig['efgImageMultiple']; // $objWidget->efgImageMultiple;
		$this->efgImageUseHomeDir = $arrConfig['efgImageUseHomeDir']; // $objWidget->efgImageUseHomeDir;
		$this->size = $arrConfig['efgImageSize']; // $objWidget->efgImageSize;
		$this->fullsize = $arrConfig['efgImageFullsize']; // $objWidget->efgImageFullsize;
		$this->sortBy = (!empty($arrConfig['efgImageSortBy']) ? $arrConfig['efgImageSortBy'] : 'name_asc');
		$this->perRow = (intval($arrConfig['efgImagePerRow']) > 0) ? intval($arrConfig['efgImagePerRow']) : 4;
		$this->perPage = 0;
		$this->imagemargin = $arrConfig['efgImageMargin']; // $objWidget->efgImageMargin;

		$this->arrData = $arrConfig;
	}


	public function __set($strKey, $varValue)
	{

		switch ($strKey)
		{

			case 'efgImageMultiple':
				$this->efgImageMultiple = strlen($varValue) ? true : false;
				break;

			case 'efgImageUseHomeDir':
				$this->efgImageUseHomeDir = strlen($varValue) ? true : false;
				break;

			case 'multiSRC':
				$this->multiSRC = $varValue;
				break;

			case 'size':
				$this->size = $varValue;
				break;

			case 'sortBy':
				$this->sortBy = $varValue;
				break;

			case 'perRow':
				$this->perRow = $varValue;
				break;

			case 'perPage':
				$this->perPage = $varValue;
				break;

			case 'imagemargin':
				$this->imagemargin = $varValue;
				break;

			case 'fullsize':
				$this->fullsize = $varValue;
				break;

			default:
				parent::__set($strKey, $varValue);
				break;
		}
	}


	/**
	 * Return if there are no files
	 * @return string
	 */
	public function generate()
	{

		// Use the home directory of the current user as file source
		if ($this->useHomeDir && FE_USER_LOGGED_IN)
		{
			$this->import('FrontendUser', 'User');

			if ($this->User->assignDir && is_dir(TL_ROOT . '/' . $this->User->homeDir))
			{
				$this->multiSRC = array($this->User->homeDir);
			}
		}
		else
		{
			$this->multiSRC = deserialize($this->multiSRC, true);
		}

		// Return if there are no files
		if (!is_array($this->multiSRC) || empty($this->multiSRC))
		{
			return '';
		}

		// Check for version 3 format
		if (!is_numeric($this->multiSRC[0]))
		{
			return '<p class="error">'.$GLOBALS['TL_LANG']['ERR']['version2format'].'</p>';
		}

		// Get the file entries from the database
		$this->objFiles = \FilesModel::findMultipleByIds($this->multiSRC);

		if ($this->objFiles === null)
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate the gallery
	 */
	protected function compile()
	{

		global $objPage;

		$images = array();
		$auxDate = array();
		$auxId = array();
		$objFiles = $this->objFiles;

		// Get all images
		while ($objFiles->next())
		{
			// Continue if the files has been processed or does not exist
			if (isset($images[$objFiles->path]) || !file_exists(TL_ROOT . '/' . $objFiles->path))
			{
				continue;
			}

			// Single files
			if ($objFiles->type == 'file')
			{
				$objFile = new \File($objFiles->path);

				if (!$objFile->isGdImage)
				{
					continue;
				}

				$arrMeta = $this->getMetaData($objFiles->meta, $objPage->language);

				// Use the file name as title if none is given
				if ($arrMeta['title'] == '')
				{
					$arrMeta['title'] = specialchars(str_replace('_', ' ', preg_replace('/^[0-9]+_/', '', $objFile->filename)));
				}

				// Add the image
				$images[$objFiles->path] = array
				(
					'id'        => $objFiles->id,
					'name'      => $objFile->basename,
					'singleSRC' => $objFiles->path,
					'alt'       => $arrMeta['title'],
					'imageUrl'  => $arrMeta['link'],
					'caption'   => $arrMeta['caption']
				);

				$auxDate[] = $objFile->mtime;
				$auxId[] = $objFiles->id;
			}

			// Folders
			else
			{
				$objSubfiles = \FilesModel::findByPid($objFiles->id);

				if ($objSubfiles === null)
				{
					continue;
				}

				while ($objSubfiles->next())
				{
					// Skip subfolders
					if ($objSubfiles->type == 'folder')
					{
						continue;
					}

					$objFile = new \File($objSubfiles->path);

					if (!$objFile->isGdImage)
					{
						continue;
					}

					$arrMeta = $this->getMetaData($objSubfiles->meta, $objPage->language);

					// Use the file name as title if none is given
					if ($arrMeta['title'] == '')
					{
						$arrMeta['title'] = specialchars(str_replace('_', ' ', preg_replace('/^[0-9]+_/', '', $objFile->filename)));
					}

					// Add the image
					$images[$objSubfiles->path] = array
					(
						'id'        => $objSubfiles->id,
						'name'      => $objFile->basename,
						'singleSRC' => $objSubfiles->path,
						'alt'       => $arrMeta['title'],
						'imageUrl'  => $arrMeta['link'],
						'caption'   => $arrMeta['caption']
					);

					$auxDate[] = $objFile->mtime;
					$auxId[] = $objSubfiles->id;
				}
			}
		}

		// Sort array
		switch ($this->sortBy)
		{
			default:
			case 'name_asc':
				uksort($images, 'basename_natcasecmp');
				break;

			case 'name_desc':
				uksort($images, 'basename_natcasercmp');
				break;

			case 'date_asc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_ASC);
				break;

			case 'date_desc':
				array_multisort($images, SORT_NUMERIC, $auxDate, SORT_DESC);
				break;

			case 'meta': // Backwards compatibility
			case 'custom':
				if ($this->orderSRC != '')
				{
					// Turn the order string into an array
					$arrOrder = array_flip(array_map('intval', explode(',', $this->orderSRC)));

					// Move the matching elements to their position in $arrOrder
					foreach ($images as $k=>$v)
					{
						if (isset($arrOrder[$v['id']]))
						{
							$arrOrder[$v['id']] = $v;
							unset($images[$k]);
						}
					}

					// Append the left-over images at the end
					if (!empty($images))
					{
						$arrOrder = array_merge($arrOrder, $images);
					}

					// Remove empty or numeric (not replaced) entries
					foreach ($arrOrder as $k=>$v)
					{
						if ($v == '' || is_numeric($v))
						{
							unset($arrOrder[$k]);
						}
					}

					$images = $arrOrder;
					unset($arrOrder);
				}
				break;

			case 'random':
				shuffle($images);
				break;
		}

		$images = array_values($images);

		// Limit the total number of items (see #2652)
		if ($this->numberOfItems > 0)
		{
			$images = array_slice($images, 0, $this->numberOfItems);
		}

		$offset = 0;
		$total = count($images);
		$limit = $total;

		// Pagination
		if ($this->perPage > 0)
		{
			// Get the current page
			$id = 'page_g' . $this->id;
			$page = \Input::get($id) ?: 1;

			// Do not index or cache the page if the page number is outside the range
			if ($page < 1 || $page > max(ceil($total/$this->perPage), 1))
			{
				global $objPage;
				$objPage->noSearch = 1;
				$objPage->cache = 0;

				// Send a 404 header
				header('HTTP/1.1 404 Not Found');
				return;
			}

			// Set limit and offset
			$offset = ($page - 1) * $this->perPage;
			$limit = min($this->perPage + $offset, $total);

			$objPagination = new \Pagination($total, $this->perPage, 7, $id);
			$this->Template->pagination = $objPagination->generate("\n  ");
		}

		$rowcount = 0;
		$colwidth = floor(100/$this->perRow);
		$intMaxWidth = (TL_MODE == 'BE') ? floor((640 / $this->perRow)) : floor(($GLOBALS['TL_CONFIG']['maxImageWidth'] / $this->perRow));
		$strLightboxId = 'lightbox[lb' . $this->id . ']';
		$body = array();

		// Rows
		for ($i = $offset; $i < $limit; $i = ($i + $this->perRow))
		{
			$class_tr = '';

			if ($rowcount == 0)
			{
				$class_tr .= ' row_first';
			}

			if (($i + $this->perRow) >= $limit)
			{
				$class_tr .= ' row_last';
			}

			$class_eo = (($rowcount % 2) == 0) ? ' even' : ' odd';

			// Columns
			for ($j = 0; $j < $this->perRow; $j++)
			{
				$class_td = '';

				if ($j == 0)
				{
					$class_td = ' col_first';
				}

				if ($j == ($this->perRow - 1))
				{
					$class_td = ' col_last';
				}

				$objCell = new \stdClass();
				$key = 'row_' . $rowcount . $class_tr . $class_eo;

				// Empty cell
				if (!is_array($images[($i + $j)]) || ($j + $i) >= $limit)
				{
					$objCell->class = 'col_'.$j . $class_td;
				}
				else
				{
					// Add size and margin
					$images[($i + $j)]['size'] = $this->size;
					$images[($i + $j)]['imagemargin'] = $this->imagemargin;
					$images[($i + $j)]['fullsize'] = $this->fullsize;

					$this->addImageToTemplate($objCell, $images[($i + $j)], $intMaxWidth, $strLightboxId);

					// Add column width and class
					$objCell->colWidth = $colwidth . '%';
					$objCell->class = 'col_'.$j . $class_td;
//TODO: use file ID or file path as option value? store ID or path in tl_formdata_details ?
					$objCell->optId = 'opt_' . $this->widget->id . '_' . ($i + $j);
					$objCell->optName = $this->widget->name;
					$objCell->srcFile = $images[($i + $j)]['singleSRC'];
					$objCell->srcFileId = $images[($i + $j)]['id'];
					$objCell->value = $images[($i + $j)]['id'];

					$blnChecked = false;
					if ($this->efgImageMultiple)
					{
						if (!is_array($this->widget->value))
						{
							$this->widget->value = array($this->widget->value);
						}

						// $blnChecked = (is_array($this->widget->value) && in_array($objCell->srcFile, $this->widget->value));
						$blnChecked = (is_array($this->widget->value) && (in_array($objCell->srcFile, $this->widget->value) || in_array($objCell->srcFileId, $this->widget->value)));
					}
					else
					{
						// $blnChecked = ($this->widget->value == $objCell->srcFile);
						$blnChecked = ($this->widget->value == $objCell->srcFile || $this->widget->value == $objCell->srcFileId);
					}
					$objCell->checked = ($blnChecked ? ' checked="checked"' : '');

				}

				$body[$key][$j] = $objCell;
			}

			++$rowcount;
		}

		/*
				$strTemplate = 'gallery_default';

				// Use a custom template
				if (TL_MODE == 'FE' && $this->galleryTpl != '')
				{
					$strTemplate = $this->galleryTpl;
				}

				$objTemplate = new \FrontendTemplate($strTemplate);
				$objTemplate->setData($this->arrData);

				$objTemplate->body = $body;
				$objTemplate->headline = $this->headline; // see #1603

				$this->Template->images = $objTemplate->parse();
		*/
		$this->Template->multiple = ($this->efgImageMultiple) ? true : false;
		$this->Template->body = $body;
		$this->Template->images = $images;

	}
}

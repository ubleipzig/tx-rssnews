.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Reference
=========

plugin.tx_pitsrssnews.settings :

feedURL
"""""""

.. container:: table-row

   Property
         feedURL

   Data type
         string

   Description
         Option to set RSS news URL



.. _includeJSlib:

includeJSlib
"""""""""""""

.. container:: table-row

   Property
         includeJSlib

   Data type
         boolean

   Description
         If this option is set to 0, it does not include jQuery library file from the extension.

         plugin.tx_pitsrssnews.settings.includeJSlib = 0

   Default
         1


.. _newsCount:

newsCount
"""""""""

.. container:: table-row

   Property
         newsCount

   Data type
         number

   Description
         Enter the number of news items to be displayed (It must be greater than 0). This is mandatory. You must enter a news item count here.


.. _cropTitle:

cropTitle
""""""""""

.. container:: table-row

   Property
         cropTitle

   Data type
         number

   Description
         If you want to crop the title characters, please enter the number of characters. (It must be greater than 0)



.. _cropDesc:

cropDesc
""""""""

.. container:: table-row

   Property
         cropDesc

   Data type
         number

   Description
        If you want to crop the description, enter the number of characters here (It must be greater than 0).


.. _rssfeedHead:

rssfeedHead
""""""""""""

.. container:: table-row

   Property
        rssfeedHead

   Data type
         boolean

   Description
         For displaying RSS feed headers, set this option to 1.

         plugin.tx_pitsrssnews.settings.rssfeedHead = 1


.. _newsDivider:

newsDivider
"""""""""""

.. container:: table-row

   Property
         newsDivider

   Data type
         boolean

   Description
         If you want to seperate news items using a ruler, set this option to 1.

         plugin.tx_pitsrssnews.settings.newsDivider = 1



.. _autoplay:

autoplay
"""""""""

.. container:: table-row

   Property
         autoplay

   Data type
         boolean

   Description
         For auto scrolling of news items, set this option to 1.

         plugin.tx_pitsrssnews.settings.autoplay = 1



.. _defaultCSS:

defaultCSS
"""""""""""

.. container:: table-row

   Property
         defaultCSS

   Data type
         boolean

   Description
        To disable default css style from loading, set this option to 0.

        plugin.tx_pitsrssnews.settings.defaultCSS = 0

   Default
         1


Autoscrolling of this extension uses “jcarousellite” jQuery plugin.



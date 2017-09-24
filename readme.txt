Hi,

Got stock on "Getting to know the Shoppify and Vendq APIs" around 10 pm.

Here is what I have done of the original task:
1. git repo with master and dev branches
2. configured the shopify private app
3. added products w/ 1-3+ variants
4. "at lease" two products for both shopify and Vend and 1 different and unique in each
5. wrote classes connecting to shopify & vendq
6. tested classes to retrieve record  data
7. exported stitchlight DDL schema (in the interest of time, borrowed from another project)

Remaining:
1. parse data from #5 above and insert into #6 db
2. Reconciling and keeping records in sync can be done via
   a. vendq's addon for shopify (configured)
      i. hopefully triggered via API or set to automatically update when records change
         Synch from Vendq to Shopify
         Synch from Shopify to Vendq
3. integreate classes into a frame work
4. rework classes such that database vendor integration can reuse or extend current classes methods
5. Expose the stitch API endpoints:  to sync, post and get products


Regards,

Emiliano
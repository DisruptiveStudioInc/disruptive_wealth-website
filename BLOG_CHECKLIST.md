# Blog Implementation Checklist

Use this checklist to ensure everything is properly set up and working.

## Phase 1: WordPress Setup

### WordPress Installation

- [ ] WordPress installed and accessible
- [ ] Admin access configured
- [ ] Permalink structure set to "Post name" (Settings > Permalinks)

### Required Plugins Installation

- [ ] **WPGraphQL** installed and activated
- [ ] **Polylang** installed and activated
- [ ] **WP GraphQL Polylang** installed and activated
- [ ] **Yoast SEO** installed and activated
- [ ] **Add WPGraphQL SEO** installed and activated

### Polylang Configuration

- [ ] English (en_US) language added
- [ ] Spanish (es_ES) language added
- [ ] English set as default language (to match site config)
- [ ] Language switcher enabled
- [ ] URL modifications configured (if needed)

### WordPress Content

- [ ] At least 3 test posts created in Spanish
- [ ] English translations created for test posts
- [ ] Posts linked via Polylang translations
- [ ] Featured images set (1200x630px recommended)
- [ ] Categories created and assigned
- [ ] Tags added to posts
- [ ] Author bios filled in (Users > Your Profile)

### Yoast SEO Configuration

- [ ] SEO titles configured for posts
- [ ] Meta descriptions written
- [ ] Open Graph images set
- [ ] Twitter card data configured
- [ ] Site defaults configured (SEO > General)

### GraphQL Endpoint Testing

- [ ] Visit `http://your-wordpress-site.com/graphql`
- [ ] GraphiQL IDE loads successfully
- [ ] Test query runs successfully:

```graphql
query TestQuery {
  posts {
    nodes {
      title
      slug
    }
  }
}
```

---

## Phase 2: PHP Application Setup

### Environment Configuration

- [ ] `.env` file exists (copied from `.env.example`)
- [ ] `WP_API_URL` configured with correct WordPress GraphQL endpoint
- [ ] `CACHE_CLEAR_TOKEN` generated (use: `openssl rand -hex 32`)
- [ ] `APP_DEBUG=true` for development

### Dependencies

- [ ] `composer install` executed successfully
- [ ] `composer dump-autoload` executed successfully
- [ ] Guzzle package installed (verify: `composer show guzzlehttp/guzzle`)

### Directory Permissions

- [ ] `cache/` directory exists
- [ ] `cache/wordpress/` directory exists
- [ ] Cache directory is writable (chmod 755)
- [ ] `.gitignore` exists in cache directory

### Code Verification

- [ ] `app/Services/WordPressClient.php` exists
- [ ] `app/Models/Blog.php` exists
- [ ] `app/Controllers/BlogController.php` exists
- [ ] `app/Views/templates/blog/index.php` exists
- [ ] `app/Views/templates/blog/show.php` exists
- [ ] Blog routes added to `config/routes.php`
- [ ] Translation keys added to `lang/en.php`
- [ ] Translation keys added to `lang/es.php`

### Autoloading

- [ ] Services namespace added to `composer.json` autoload
- [ ] No PHP errors when visiting site

---

## Phase 3: Testing

### Basic Connectivity

- [ ] PHP application server running
- [ ] Can access homepage
- [ ] WordPress site accessible from PHP server

### Blog Index Page

- [ ] Visit `/blog` (Spanish version)
- [ ] Page loads without errors
- [ ] Posts are displayed
- [ ] Featured images show correctly
- [ ] Categories sidebar visible
- [ ] Pagination appears (if more than 12 posts)

### Blog Index English

- [ ] Visit `/en/blog` (English version)
- [ ] Page loads without errors
- [ ] English posts displayed
- [ ] Translations work correctly

### Single Post Page

- [ ] Visit `/blog/post-slug` (Spanish post)
- [ ] Post content displays
- [ ] Featured image shows
- [ ] Author info displays
- [ ] Categories and tags visible
- [ ] Reading time calculated
- [ ] Related posts appear (if available)
- [ ] Social sharing buttons present

### Single Post English

- [ ] Visit `/en/blog/post-slug` (English post)
- [ ] Post displays correctly
- [ ] Translation switcher works (if translations exist)

### Pagination

- [ ] Create 15+ posts in WordPress
- [ ] Clear cache
- [ ] Visit `/blog`
- [ ] Pagination controls appear
- [ ] Click "Next" - loads page 2
- [ ] Click "Previous" - returns to page 1
- [ ] Direct page URLs work (`/blog?page=2`)

### Category Filtering

- [ ] Click on a category
- [ ] URL changes to `/blog?category=slug`
- [ ] Only posts from that category display
- [ ] Category highlighted in sidebar

### Caching

- [ ] Visit a blog page twice
- [ ] Second load faster (from cache)
- [ ] Cache files created in `cache/wordpress/`
- [ ] Call cache clear endpoint:

```bash
curl -X POST "http://yoursite.com/blog/cache/clear?token=YOUR_TOKEN"
```

- [ ] Cache files deleted
- [ ] Verify with: `ls -la cache/wordpress/`

### SEO Meta Tags

- [ ] View page source of single post
- [ ] `<title>` tag present with correct content
- [ ] Meta description tag present
- [ ] Open Graph tags present (`og:title`, `og:description`, `og:image`)
- [ ] Twitter Card tags present
- [ ] Canonical URL present
- [ ] JSON-LD structured data present (search for `application/ld+json`)

### Error Handling

- [ ] Visit non-existent post: `/blog/fake-slug-12345`
- [ ] 404 page displays
- [ ] Stop WordPress temporarily
- [ ] Visit `/blog`
- [ ] Error message displays (not blank page)
- [ ] Check error log for logged errors

---

## Phase 4: Advanced Features

### Translations

- [ ] Create post in Spanish
- [ ] Create English translation
- [ ] Link translations in Polylang
- [ ] View Spanish post - translation link appears
- [ ] Click translation link - switches to English version
- [ ] URL changes appropriately (`/blog/es-slug` → `/en/blog/en-slug`)

### Author Features

- [ ] Author avatar displays
- [ ] Author name appears
- [ ] Author bio shows (if filled in WordPress)
- [ ] Multiple authors work correctly

### Social Sharing

- [ ] Click Twitter share button
- [ ] Tweet composer opens with correct title and URL
- [ ] Click Facebook share button
- [ ] Facebook share dialog opens
- [ ] Click LinkedIn share button
- [ ] LinkedIn share dialog opens

### Related Posts

- [ ] Create 3+ posts in same category
- [ ] View one post
- [ ] Related posts section appears at bottom
- [ ] Shows 2-3 related posts
- [ ] Current post not in related posts

### Reading Time

- [ ] View post with ~200 words
- [ ] Reading time shows ~1 min
- [ ] View post with ~600 words
- [ ] Reading time shows ~3 min

---

## Phase 5: Performance & Security

### Performance Testing

- [ ] First page load time recorded
- [ ] Cached page load time recorded (should be <100ms)
- [ ] API response time acceptable (<1s)
- [ ] Images load properly
- [ ] No console errors in browser

### Security Checks

- [ ] Cache clear endpoint requires token
- [ ] Call without token returns 403
- [ ] Call with wrong token returns 403
- [ ] HTML output properly escaped (view source, check for XSS)
- [ ] SQL injection not applicable (GraphQL API)

### Error Logging

- [ ] Check PHP error log location
- [ ] Cause an error (stop WordPress)
- [ ] Visit blog page
- [ ] Error logged to file
- [ ] Error message user-friendly (not exposing internals)

---

## Phase 6: Production Readiness

### Configuration

- [ ] `APP_ENV=production` in `.env`
- [ ] `APP_DEBUG=false` in `.env`
- [ ] Production WordPress URL in `WP_API_URL`
- [ ] Strong `CACHE_CLEAR_TOKEN` set
- [ ] All sensitive data in `.env` (not hardcoded)

### Optimization

- [ ] Cache TTL appropriate for production (3600s = 1 hour)
- [ ] Composer production install: `composer install --no-dev --optimize-autoloader`
- [ ] WordPress caching plugin configured
- [ ] CDN configured for images (optional)

### Monitoring Setup

- [ ] Error logging enabled
- [ ] Log rotation configured
- [ ] Uptime monitoring set up
- [ ] Performance monitoring in place

### Backup Strategy

- [ ] WordPress database backup scheduled
- [ ] WordPress files backup scheduled
- [ ] Application backup scheduled
- [ ] Backup restoration tested

### Documentation

- [ ] Team trained on blog usage
- [ ] WordPress access documented
- [ ] Cache clear webhook documented
- [ ] Emergency procedures documented

---

## Phase 7: WordPress Webhook (Optional)

### Webhook Plugin

- [ ] Webhook plugin installed (e.g., WP Webhooks)
- [ ] Plugin configured
- [ ] Webhook URL set to cache clear endpoint
- [ ] Token added to URL
- [ ] Triggers configured:
  - [ ] Post published
  - [ ] Post updated
  - [ ] Post deleted

### Webhook Testing

- [ ] Publish new post in WordPress
- [ ] Check PHP application cache directory
- [ ] Cache files should be deleted
- [ ] New post appears immediately on blog
- [ ] Update post in WordPress
- [ ] Changes reflect immediately (cache cleared)

---

## Final Verification

### Complete Feature Test

- [ ] All Spanish posts display correctly
- [ ] All English posts display correctly
- [ ] Pagination works in both languages
- [ ] Category filtering works
- [ ] Search works (if implemented)
- [ ] SEO meta tags correct
- [ ] Social sharing works
- [ ] Mobile responsive
- [ ] Cross-browser compatible (Chrome, Firefox, Safari, Edge)

### Performance Benchmarks

- [ ] Blog index (cached) < 100ms
- [ ] Single post (cached) < 100ms
- [ ] Blog index (uncached) < 2s
- [ ] Single post (uncached) < 2s
- [ ] Images load within 1s

### User Acceptance

- [ ] Content team can create posts
- [ ] Content appears correctly on site
- [ ] Translations work as expected
- [ ] SEO team satisfied with meta tags
- [ ] Stakeholders approve design

---

## Issue Tracking

Use this section to track any issues found during testing:

### Issue 1

- **Description**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Status**: [ ] Open [ ] Fixed [ ] Closed

### Issue 2

- **Description**:
- **Steps to Reproduce**:
- **Expected**:
- **Actual**:
- **Status**: [ ] Open [ ] Fixed [ ] Closed

---

## Sign-Off

### Development Team

- [ ] All code committed to repository
- [ ] Code reviewed
- [ ] Tests passed
- [ ] Documentation complete
- **Developer**: **\*\*\*\***\_**\*\*\*\*** **Date**: **\_\_\_**

### QA Team

- [ ] All test cases passed
- [ ] No critical bugs
- [ ] Performance acceptable
- **QA Lead**: **\*\*\*\***\_**\*\*\*\*** **Date**: **\_\_\_**

### Product Owner

- [ ] Features meet requirements
- [ ] Ready for production
- **Product Owner**: **\*\*\*\***\_**\*\*\*\*** **Date**: **\_\_\_**

---

## Post-Launch

### Day 1

- [ ] Monitor error logs
- [ ] Check performance metrics
- [ ] Verify caching working
- [ ] Test all major features

### Week 1

- [ ] Review analytics
- [ ] Check SEO indexing
- [ ] Monitor server resources
- [ ] Gather user feedback

### Month 1

- [ ] Performance review
- [ ] Feature requests logged
- [ ] Bug fixes prioritized
- [ ] Plan next iteration

---

**Checklist Version**: 1.0
**Last Updated**: December 11, 2025

Keep this checklist for future reference and maintenance cycles.

# Blog Quick Setup Guide

## Prerequisites

- PHP 8.3+
- Composer
- Headless WordPress instance with GraphQL
- WordPress plugins installed (see below)

## Step 1: WordPress Setup

### Install Required Plugins

```bash
# Via WP-CLI (if available)
wp plugin install wp-graphql --activate
wp plugin install polylang --activate
wp plugin install wp-graphql-polylang --activate
wp plugin install wordpress-seo --activate
wp plugin install add-wpgraphql-seo --activate
```

Or install manually from WordPress admin.

### Configure Polylang

1. Go to `Languages` in WordPress admin
2. Add languages: English (en) and Spanish (es)
3. Set English as default (to match your site configuration)
4. Enable language switcher

### Test GraphQL Endpoint

Visit: `http://your-wordpress-site.com/graphql`

You should see the GraphiQL IDE.

## Step 2: PHP Application Setup

### 1. Install Dependencies

```bash
cd /path/to/disruptivestudio-website
composer install
```

### 2. Configure Environment

```bash
# Copy .env.example to .env
cp .env.example .env

# Edit .env and add:
WP_API_URL=http://your-wordpress-site.com/graphql
CACHE_CLEAR_TOKEN=generate-a-random-token-here
```

### 3. Set Permissions

```bash
# Ensure cache directory is writable
chmod 755 cache
chmod 755 cache/wordpress
```

### 4. Test the Installation

```bash
# Start your local server
php -S localhost:8000 -t public

# Or if using Docker
docker-compose up
```

Visit:

- `http://localhost:8000/blog` (Spanish)
- `http://localhost:8000/en/blog` (English)

## Step 3: Create Test Content

### Create a Test Post in WordPress

1. Go to `Posts > Add New`
2. Write your post
3. Set featured image (recommended: 1200x630px)
4. Add categories and tags
5. Fill Yoast SEO fields
6. **Publish**
7. Switch language (Polylang) and create English version
8. Link the translations

### Test Post Structure

```
Title: "Welcome to Our Blog" / "Bienvenido a Nuestro Blog"
Slug: "welcome-to-our-blog" / "bienvenido-a-nuestro-blog"
Content: Your content here
Featured Image: Set an image
Categories: Technology, News
Tags: welcome, introduction
SEO Title: Custom SEO title (optional)
SEO Description: Custom meta description
```

## Step 4: Verify Everything Works

### Test GraphQL Query

Use GraphiQL at `http://your-wordpress-site.com/graphql`:

```graphql
query TestQuery {
  posts(where: { language: ES }) {
    nodes {
      title
      slug
      excerpt
      featuredImage {
        node {
          sourceUrl
        }
      }
    }
  }
}
```

### Test PHP Application

```bash
# Test blog index
curl http://localhost:8000/blog

# Test single post
curl http://localhost:8000/blog/welcome-to-our-blog

# Test English version
curl http://localhost:8000/en/blog/welcome-to-our-blog
```

## Step 5: Configure WordPress Webhook (Optional)

To automatically clear cache when posts are updated:

### Install Webhook Plugin

```bash
wp plugin install wp-webhooks --activate
```

### Configure Webhook

1. Go to `WP Webhooks > Send Data`
2. Add new webhook
3. Trigger: `Post updated`, `Post published`, `Post deleted`
4. URL: `https://yoursite.com/blog/cache/clear?token=YOUR_TOKEN`
5. Method: `POST`

## Troubleshooting

### Common Issues

**Issue**: "WP_API_URL environment variable is not set"

```bash
# Solution: Check your .env file exists and has WP_API_URL
cat .env | grep WP_API_URL
```

**Issue**: Blog page shows no posts

```bash
# 1. Verify WordPress has posts
# 2. Test GraphQL endpoint
curl http://your-wordpress-site.com/graphql \
  -H "Content-Type: application/json" \
  -d '{"query":"{ posts { nodes { title } } }"}'

# 3. Check PHP error logs
tail -f /path/to/php-error.log
```

**Issue**: 404 on blog routes

```bash
# Check routes are loaded
grep -r "blog" config/routes.php

# Check .htaccess or nginx config for URL rewriting
```

**Issue**: Images not loading

```bash
# Verify WordPress is accessible
curl -I http://your-wordpress-site.com

# Check image URLs in browser console
```

## Development Tips

### Clear Cache During Development

```bash
# Clear all cache
curl -X POST "http://localhost:8000/blog/cache/clear?token=YOUR_TOKEN"

# Or manually
rm -rf cache/wordpress/*
```

### Reduce Cache TTL for Testing

In `app/Services/WordPressClient.php`:

```php
private int $cacheTTL = 60; // 1 minute instead of 1 hour
```

### Enable Debug Mode

In `.env`:

```bash
APP_DEBUG=true
```

### View GraphQL Queries

Add temporary logging in `WordPressClient::request()`:

```php
error_log("GraphQL Query: " . $query);
error_log("Variables: " . json_encode($variables));
```

## Production Deployment

### Before Going Live

1. **Set Production URLs**

```bash
APP_ENV=production
APP_DEBUG=false
WP_API_URL=https://your-production-wordpress.com/graphql
```

2. **Optimize Cache**

```bash
# Consider increasing cache TTL
# In WordPressClient: $cacheTTL = 7200; // 2 hours
```

3. **Security**

```bash
# Use strong cache clear token
CACHE_CLEAR_TOKEN=$(openssl rand -hex 32)
```

4. **Test Everything**

```bash
# Test blog index
# Test post pages
# Test pagination
# Test category filtering
# Test language switching
# Test SEO meta tags
# Test social sharing
```

5. **Setup Monitoring**

- Monitor API response times
- Track error rates
- Watch cache hit ratios
- Monitor disk space (cache directory)

6. **Backup**

- Backup WordPress database
- Backup cache directory (optional)
- Document WordPress plugin versions

## Next Steps

1. Create more blog posts
2. Design custom styling for blog templates
3. Add custom CSS classes matching your design system
4. Setup analytics tracking
5. Configure CDN for images (optional)
6. Add sitemap generation for blog posts
7. Setup automated backups

## Resources

- [WPGraphQL Documentation](https://www.wpgraphql.com/docs)
- [Polylang Documentation](https://polylang.pro/doc/)
- [Yoast SEO](https://yoast.com/wordpress/plugins/seo/)
- [Guzzle Documentation](https://docs.guzzlephp.org/)

## Support Checklist

- [ ] WordPress plugins installed and activated
- [ ] Polylang configured with ES and EN
- [ ] GraphQL endpoint accessible
- [ ] .env file configured with WP_API_URL
- [ ] Cache directory created with proper permissions
- [ ] Composer dependencies installed
- [ ] Test post created in both languages
- [ ] Blog index page loads
- [ ] Single post page loads
- [ ] Language switching works
- [ ] SEO meta tags present
- [ ] Featured images display correctly

---

**Quick Start Time**: ~30 minutes
**Difficulty**: Intermediate

If you encounter any issues, refer to `BLOG_IMPLEMENTATION.md` for detailed documentation.

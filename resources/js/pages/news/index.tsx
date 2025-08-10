import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';
import { Button } from '@/components/ui/button';

interface NewsItem {
    id: number;
    title: string;
    slug: string;
    excerpt?: string;
    published_at: string;
    image?: string;
    user: {
        name: string;
    };
}

interface Props {
    news: {
        data: NewsItem[];
        current_page: number;
        last_page: number;
        per_page: number;
        total: number;
    };
    [key: string]: unknown;
}

export default function NewsIndex({ news }: Props) {
    return (
        <>
            <Head title="University News" />
            
            <div className="min-h-screen bg-gray-50">
                {/* Navigation */}
                <nav className="bg-white shadow-sm border-b">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between items-center h-16">
                            <Link href="/" className="flex items-center space-x-2">
                                <div className="text-2xl font-bold text-blue-600">🎓 ModernU</div>
                            </Link>
                            <div className="flex items-center space-x-6">
                                <Link href="/" className="text-gray-700 hover:text-blue-600">Home</Link>
                                <Link href="/faculties" className="text-gray-700 hover:text-blue-600">Faculties</Link>
                                <Link href="/study-programs" className="text-gray-700 hover:text-blue-600">Programs</Link>
                                <Link href="/news" className="text-blue-600 font-medium">News</Link>
                                <Link href="/gallery" className="text-gray-700 hover:text-blue-600">Gallery</Link>
                            </div>
                        </div>
                    </div>
                </nav>

                <div className="max-w-6xl mx-auto px-4 py-12">
                    <div className="text-center mb-12">
                        <h1 className="text-4xl font-bold text-gray-900 mb-4">📰 University News</h1>
                        <p className="text-xl text-gray-600 max-w-2xl mx-auto">
                            Stay updated with the latest news, events, and announcements from our university
                        </p>
                    </div>

                    {news.data.length === 0 ? (
                        <Card className="text-center py-12">
                            <CardContent>
                                <div className="text-6xl mb-4">📰</div>
                                <h3 className="text-lg font-semibold mb-2">No News Available</h3>
                                <p className="text-gray-600">
                                    Check back later for the latest university updates
                                </p>
                            </CardContent>
                        </Card>
                    ) : (
                        <>
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                                {news.data.map((article) => (
                                    <Card key={article.id} className="hover:shadow-lg transition-shadow overflow-hidden">
                                        {article.image && (
                                            <div className="h-48 bg-gradient-to-r from-blue-500 to-purple-600"></div>
                                        )}
                                        
                                        <CardHeader>
                                            <CardTitle className="line-clamp-2 text-lg">
                                                {article.title}
                                            </CardTitle>
                                            <CardDescription className="flex items-center justify-between">
                                                <span>By {article.user.name}</span>
                                                <span>{new Date(article.published_at).toLocaleDateString()}</span>
                                            </CardDescription>
                                        </CardHeader>
                                        
                                        <CardContent className="space-y-4">
                                            {article.excerpt && (
                                                <p className="text-sm text-gray-600 line-clamp-3">
                                                    {article.excerpt}
                                                </p>
                                            )}
                                            
                                            <Link href={`/news/${article.slug}`}>
                                                <Button variant="link" className="p-0 h-auto">
                                                    Read Full Article →
                                                </Button>
                                            </Link>
                                        </CardContent>
                                    </Card>
                                ))}
                            </div>

                            {/* Pagination */}
                            {news.last_page > 1 && (
                                <Card className="mt-12">
                                    <CardContent className="flex items-center justify-between py-6">
                                        <div className="text-sm text-gray-600">
                                            Showing {((news.current_page - 1) * news.per_page) + 1} to{' '}
                                            {Math.min(news.current_page * news.per_page, news.total)} of{' '}
                                            {news.total} articles
                                        </div>
                                        
                                        <div className="flex items-center space-x-4">
                                            {news.current_page > 1 && (
                                                <Button variant="outline" size="sm">
                                                    ← Previous
                                                </Button>
                                            )}
                                            
                                            <span className="text-sm text-gray-600">
                                                Page {news.current_page} of {news.last_page}
                                            </span>
                                            
                                            {news.current_page < news.last_page && (
                                                <Button variant="outline" size="sm">
                                                    Next →
                                                </Button>
                                            )}
                                        </div>
                                    </CardContent>
                                </Card>
                            )}
                        </>
                    )}
                </div>
                
                {/* Footer */}
                <footer className="bg-gray-900 text-white py-8 mt-12">
                    <div className="max-w-6xl mx-auto px-4 text-center">
                        <div className="text-2xl font-bold mb-4">🎓 ModernU</div>
                        <p className="text-gray-400 mb-4">
                            Excellence in higher education since 1950
                        </p>
                        <div className="flex justify-center space-x-6 text-sm">
                            <Link href="/" className="text-gray-400 hover:text-white">Home</Link>
                            <Link href="/page/about" className="text-gray-400 hover:text-white">About</Link>
                            <Link href="/page/contact" className="text-gray-400 hover:text-white">Contact</Link>
                            <Link href="/login" className="text-gray-400 hover:text-white">Admin</Link>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}
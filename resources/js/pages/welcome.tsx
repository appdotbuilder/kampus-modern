import React from 'react';
import { Head, Link } from '@inertiajs/react';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardDescription, CardHeader, CardTitle } from '@/components/ui/card';

interface Props {
    featuredNews?: Array<{
        id: number;
        title: string;
        excerpt: string;
        slug: string;
        published_at: string;
        image?: string;
    }>;
    faculties?: Array<{
        id: number;
        name: string;
        code: string;
        description?: string;
        study_programs_count: number;
    }>;
    featuredGallery?: Array<{
        id: number;
        title: string;
        image: string;
        description?: string;
    }>;
    [key: string]: unknown;
}

export default function Welcome({ featuredNews = [], faculties = [] }: Props) {
    return (
        <>
            <Head title="Welcome to Modern University" />
            
            <div className="min-h-screen bg-gradient-to-b from-blue-50 to-white">
                {/* Navigation */}
                <nav className="bg-white shadow-sm border-b">
                    <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div className="flex justify-between items-center h-16">
                            <div className="flex items-center space-x-4">
                                <div className="text-2xl font-bold text-blue-600">🎓 ModernU</div>
                                <div className="hidden md:flex space-x-6">
                                    <Link href="/faculties" className="text-gray-700 hover:text-blue-600">Faculties</Link>
                                    <Link href="/study-programs" className="text-gray-700 hover:text-blue-600">Programs</Link>
                                    <Link href="/news" className="text-gray-700 hover:text-blue-600">News</Link>
                                    <Link href="/gallery" className="text-gray-700 hover:text-blue-600">Gallery</Link>
                                </div>
                            </div>
                            <div className="flex items-center space-x-4">
                                <Link href="/login">
                                    <Button variant="outline" size="sm">Login</Button>
                                </Link>
                                <Link href="/register">
                                    <Button size="sm">Register</Button>
                                </Link>
                            </div>
                        </div>
                    </div>
                </nav>

                {/* Hero Section */}
                <section className="py-20 px-4">
                    <div className="max-w-6xl mx-auto text-center">
                        <h1 className="text-5xl font-bold text-gray-900 mb-6">
                            🏛️ Welcome to Modern University
                        </h1>
                        <p className="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                            Discover excellence in higher education with our comprehensive academic programs, 
                            world-class faculty, and innovative research opportunities. Your future starts here.
                        </p>
                        
                        <div className="grid grid-cols-1 md:grid-cols-4 gap-6 mb-12">
                            <div className="bg-white rounded-lg p-6 shadow-md">
                                <div className="text-3xl mb-2">📚</div>
                                <h3 className="font-semibold text-gray-900">Academic Programs</h3>
                                <p className="text-sm text-gray-600">Comprehensive study programs across multiple faculties</p>
                            </div>
                            <div className="bg-white rounded-lg p-6 shadow-md">
                                <div className="text-3xl mb-2">👨‍🏫</div>
                                <h3 className="font-semibold text-gray-900">Expert Faculty</h3>
                                <p className="text-sm text-gray-600">Learn from experienced professionals and researchers</p>
                            </div>
                            <div className="bg-white rounded-lg p-6 shadow-md">
                                <div className="text-3xl mb-2">🔬</div>
                                <h3 className="font-semibold text-gray-900">Research Excellence</h3>
                                <p className="text-sm text-gray-600">Cutting-edge research facilities and opportunities</p>
                            </div>
                            <div className="bg-white rounded-lg p-6 shadow-md">
                                <div className="text-3xl mb-2">🌍</div>
                                <h3 className="font-semibold text-gray-900">Global Network</h3>
                                <p className="text-sm text-gray-600">International partnerships and exchange programs</p>
                            </div>
                        </div>

                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link href="/study-programs">
                                <Button size="lg" className="px-8">
                                    📖 Explore Programs
                                </Button>
                            </Link>
                            <Link href="/faculties">
                                <Button variant="outline" size="lg" className="px-8">
                                    🏢 View Faculties
                                </Button>
                            </Link>
                        </div>
                    </div>
                </section>

                {/* Faculties Section */}
                {faculties.length > 0 && (
                    <section className="py-16 bg-gray-50">
                        <div className="max-w-6xl mx-auto px-4">
                            <div className="text-center mb-12">
                                <h2 className="text-3xl font-bold text-gray-900 mb-4">🏛️ Our Faculties</h2>
                                <p className="text-gray-600">Discover our diverse range of academic faculties and departments</p>
                            </div>
                            
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {faculties.slice(0, 6).map((faculty) => (
                                    <Card key={faculty.id} className="hover:shadow-lg transition-shadow">
                                        <CardHeader>
                                            <CardTitle className="flex items-center gap-2">
                                                <span className="text-2xl">🎯</span>
                                                {faculty.name}
                                            </CardTitle>
                                            <CardDescription>
                                                Code: {faculty.code} • {faculty.study_programs_count} Programs
                                            </CardDescription>
                                        </CardHeader>
                                        {faculty.description && (
                                            <CardContent>
                                                <p className="text-sm text-gray-600 line-clamp-3">
                                                    {faculty.description}
                                                </p>
                                            </CardContent>
                                        )}
                                    </Card>
                                ))}
                            </div>
                            
                            <div className="text-center mt-8">
                                <Link href="/faculties">
                                    <Button variant="outline">View All Faculties →</Button>
                                </Link>
                            </div>
                        </div>
                    </section>
                )}

                {/* Latest News Section */}
                {featuredNews.length > 0 && (
                    <section className="py-16">
                        <div className="max-w-6xl mx-auto px-4">
                            <div className="text-center mb-12">
                                <h2 className="text-3xl font-bold text-gray-900 mb-4">📰 Latest News</h2>
                                <p className="text-gray-600">Stay updated with the latest happenings at our university</p>
                            </div>
                            
                            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                {featuredNews.map((news) => (
                                    <Card key={news.id} className="hover:shadow-lg transition-shadow">
                                        {news.image && (
                                            <div className="h-48 bg-gray-200 rounded-t-lg"></div>
                                        )}
                                        <CardHeader>
                                            <CardTitle className="line-clamp-2">
                                                {news.title}
                                            </CardTitle>
                                            <CardDescription>
                                                {new Date(news.published_at).toLocaleDateString()}
                                            </CardDescription>
                                        </CardHeader>
                                        <CardContent>
                                            <p className="text-sm text-gray-600 line-clamp-3 mb-4">
                                                {news.excerpt}
                                            </p>
                                            <Link href={`/news/${news.slug}`}>
                                                <Button variant="link" className="p-0 h-auto">
                                                    Read More →
                                                </Button>
                                            </Link>
                                        </CardContent>
                                    </Card>
                                ))}
                            </div>
                            
                            <div className="text-center mt-8">
                                <Link href="/news">
                                    <Button variant="outline">View All News →</Button>
                                </Link>
                            </div>
                        </div>
                    </section>
                )}

                {/* CTA Section */}
                <section className="py-16 bg-blue-600 text-white">
                    <div className="max-w-4xl mx-auto px-4 text-center">
                        <h2 className="text-3xl font-bold mb-4">🚀 Ready to Start Your Journey?</h2>
                        <p className="text-xl mb-8 opacity-90">
                            Join thousands of students who have chosen Modern University for their academic success
                        </p>
                        <div className="flex flex-col sm:flex-row gap-4 justify-center">
                            <Link href="/register">
                                <Button size="lg" variant="secondary" className="px-8">
                                    🎓 Apply Now
                                </Button>
                            </Link>
                            <Link href="/page/admissions">
                                <Button size="lg" variant="outline" className="px-8 text-white border-white hover:bg-white hover:text-blue-600">
                                    📋 Admission Info
                                </Button>
                            </Link>
                        </div>
                    </div>
                </section>

                {/* Footer */}
                <footer className="bg-gray-900 text-white py-12">
                    <div className="max-w-6xl mx-auto px-4">
                        <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
                            <div>
                                <div className="text-2xl font-bold mb-4">🎓 ModernU</div>
                                <p className="text-gray-400 text-sm">
                                    Excellence in higher education since 1950
                                </p>
                            </div>
                            <div>
                                <h3 className="font-semibold mb-4">Academics</h3>
                                <ul className="space-y-2 text-sm">
                                    <li><Link href="/faculties" className="text-gray-400 hover:text-white">Faculties</Link></li>
                                    <li><Link href="/study-programs" className="text-gray-400 hover:text-white">Study Programs</Link></li>
                                    <li><Link href="/page/admissions" className="text-gray-400 hover:text-white">Admissions</Link></li>
                                </ul>
                            </div>
                            <div>
                                <h3 className="font-semibold mb-4">Campus Life</h3>
                                <ul className="space-y-2 text-sm">
                                    <li><Link href="/gallery" className="text-gray-400 hover:text-white">Gallery</Link></li>
                                    <li><Link href="/news" className="text-gray-400 hover:text-white">News</Link></li>
                                    <li><Link href="/page/events" className="text-gray-400 hover:text-white">Events</Link></li>
                                </ul>
                            </div>
                            <div>
                                <h3 className="font-semibold mb-4">About</h3>
                                <ul className="space-y-2 text-sm">
                                    <li><Link href="/page/about" className="text-gray-400 hover:text-white">About Us</Link></li>
                                    <li><Link href="/page/history" className="text-gray-400 hover:text-white">History</Link></li>
                                    <li><Link href="/page/contact" className="text-gray-400 hover:text-white">Contact</Link></li>
                                </ul>
                            </div>
                        </div>
                        <div className="border-t border-gray-800 mt-8 pt-8 text-center">
                            <p className="text-gray-400 text-sm">
                                © 2024 Modern University. All rights reserved. | 
                                <Link href="/login" className="ml-2 hover:text-white">Admin Login</Link>
                            </p>
                        </div>
                    </div>
                </footer>
            </div>
        </>
    );
}
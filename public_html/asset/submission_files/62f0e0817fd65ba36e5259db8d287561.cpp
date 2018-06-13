#include <cstdio>
#include <iostream>
using namespace std;

int main () {
	int test;
	scanf ("%d", &test);
	while (test--) {
			int n, d, r;
			scanf ("%d %d %d", &n, &d, &r);
			int arr [n];
			for (int a=0;a<n;a++) {
				scanf ("%d", &arr[a]);
			}
			int brr [n];
			for (int b=0;b<n;b++){
				scanf ("%d", &brr[b]);
			}
			long long total = 0;
			for (int a=0;a<n;a++){
				if (arr[a]-d>0) total+=(arr[a]-d)*r;
			}	
			for (int a=0;a<n;a++){
				if (brr[a]-d>0) total+=(brr[a]-d)*r;
			}
			printf ("%d\n", total);
		}
	}
		

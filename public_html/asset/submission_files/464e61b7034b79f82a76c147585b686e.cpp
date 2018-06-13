#include<stdio.h>
#include<math.h>
using namespace std;
int main ()
{
	int t;
	scanf("%d",&t);
	while(t--)
	{
		int n;
		scanf("%d",&n);
		int arr[n];
		for(int a=0;a<n;a++)
			scanf("%d",&arr[a]);
		for(int a=0;a<n;a++)
			for(int b=0;b<n;b++)
				if(arr[b]<arr[b+1])
				{
					int tukar=arr[b];
					arr[b]=arr[b+1];
					arr[b+1]=tukar;
				}
		long long total=0; 
		for(int a=0;a<n;a++)
			for(int b=0;b<n-a;b++)
			{
				total+=((arr[a]-arr[a+b])*pow(2,b-1));
			}
		total=total%1000000007;
		printf("%lld\n",total);	
	}
}

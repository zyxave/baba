#include<stdio.h>
using namespace std;

int main ()
{
	int t;
	scanf("%d",&t);
	for(int x=1;x<=t;x++)
	{
		int n;
		scanf("%d",&n);
		if(n>0)
		{
			int banyak=0;
			int arr[n];
			for(int a=0;a<n;a++)
			{
				scanf("%d",&arr[a]);
				banyak+=arr[a];
			}
			if(banyak%3==0)
				printf("Yes\n");
			else
				printf("No\n");
		}
	}
	return 0;
}
